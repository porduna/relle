<?php
// MUST be using composer
require_once '/var/www/relle/vendor/autoload.php';
session_start();

$client = new Google_Client();
// Name of proj in GoogleDeveloperConsole
$client->setApplicationName("relle-analytics");

// Generated in GoogleDeveloperConsole --> Credentials --> Service Accounts
$client->setAuthConfig('/var/www/relle/relle-analytics-3753dd041a88.json');
$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

// Grab token if it's set
if (isset($_SESSION['service_token'])) {
    $client->setAccessToken($_SESSION['service_token']);
}

// Refresh if expired
if ($client->isAccessTokenExpired()) {
    $client->refreshTokenWithAssertion();
}

// Pin to Session
$_SESSION['service_token'] = $client->getAccessToken();

$myToken = $client->getAccessToken();
?>
{{Analytics::trackEvent('Página', 'Logs')}}
@extends ('layout.dashboard')

@section('page')
{{trans('interface.name', ['page'=>trans('log.title')])}}        
@stop

@section("title_inside")
{{trans('log.title')}}  
@stop

@section ('inside')
<!-- Load Google's Embed API Library -->
<script>
    (function (w, d, s, g, js, fs) {
        g = w.gapi || (w.gapi = {});
        g.analytics = {q: [], ready: function (f) {
                this.q.push(f);
            }};
        js = d.createElement(s);
        fs = d.getElementsByTagName(s)[0];
        js.src = 'https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js, fs);
        js.onload = function () {
            g.load('analytics');
        };
    }(window, document, 'script'));
</script>
<div style="display: inline-block">
    <p style="float: left">{{trans('log.totalSessions')}}</p><div style="float: left; margin-left: 10px; margin-top: 5px;" id="chart-2-container"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div id="chart-1-container"></div>
    </div>
</div>
@stop
@section('script_dash')
<script>
    gapi.analytics.ready(function () {

        /**
         * Authorize the user with an access token obtained server side.
         */
        gapi.analytics.auth.authorize({
            'serverAuth': {
                'access_token': '<?php print_r($myToken["access_token"]); ?>'
            }
        });


        /* Creates a new DataChart instance showing sessions over the past 30 days.
         * It will be rendered inside an element with the id "chart-1-container".
         */
        var dataChart1 = new gapi.analytics.googleCharts.DataChart({
            query: {
                'ids': 'ga:107648503', // THIS NEEDS TO BE A VIEW
                'metrics': 'ga:users,ga:totalEvents',
                'dimensions': 'ga:date,ga:country,ga:city',
                'start-date': '30daysAgo',
                'end-date': 'today',
                'sort': '-ga:date'
            },
            chart: {
                container: 'chart-1-container',
                type: 'TABLE',
                options: {
                    width: '100%'
                }
            }
        });
        
        var dataChart2 = new gapi.analytics.report.Data({
            query: {
                'ids': 'ga:107648503', // THIS NEEDS TO BE A VIEW
                'metrics': 'ga:sessions',
                'start-date': '2015-08-01',
                'end-date': 'today'
            }
        });
        dataChart2.on('success', function (dataChart2) {
            for (var prop in dataChart2) {
                var outputDiv = document.getElementById('chart-2-container');
                outputDiv.innerHTML = dataChart2[prop]; }
           
        });
        dataChart1.execute();
        dataChart2.execute();
    });
</script>
@stop
