<html>

<head>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>





    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $participation ;?>);

            var options = {
                title: "Participation Rate",
                height: 400,
                bar: {groupWidth: 25},
                legend: { position: "none" },
                vAxis: {
                    viewWindowMode:'explicit',
                    viewWindow: {
                        max:100,
                        min:50
                    }
                },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divP'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divP').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $participation_mm ;?>);

            var options = {
                title: "Participation Rate M-M",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divMM'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divMM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $participation_yy ;?>);

            var options = {
                title: "Participation Rate Y-Y",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divYY'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divYY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $employment_mm ;?>);

            var options = {
                title: "Employment Rate M-M",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                vAxis: {
                    textPosition: 'none',
                    viewWindowMode:'explicit',
                    viewWindow: {
                        max:2
                    }
                },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERMM'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divERMM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $employment_yy ;?>);

            var options = {
                title: "Employment Rate Y-Y",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERYY'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divERYY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $employment_ur ;?>);

            var options = {
                title: "Unemployment Rate",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divUR').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $employment_urMM ;?>);

            var options = {
                title: "Unemployment Rate M-M",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR_MM'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divUR_MM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $employment_urYY ;?>);

            var options = {
                title: "Unemployment Rate Y-Y",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR_YY'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divUR_YY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>


    <script type="text/javascript">

        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $growth_10yr ;?>);

            var options = {
                title: "Employment growth over the last ten years",
                height: 400,
                vAxis: { format: 'short' },
                bar: {groupWidth: 25},
                legend: { position: "none" },
                annotations: {
                    textStyle: {
                        color: 'black',
                        fontSize: 10
                    },
                    alwaysOutside: true
                }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divGrowth_10'));
            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_divGrowth_10').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>
</head>

<body>
<!--Div that will hold the chart-->
<div id="chart_divP" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divP"></button></div>
<br>
<br>
<div id="chart_divMM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divMM"></button></div>
<br>
<br>
<div id="chart_divYY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divYY"></button></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divERMM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divERMM"></button></div>
<br>
<br>
<div id="chart_divERYY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divERYY"></button></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divUR" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR"></button></div>
<br>
<br>
<div id="chart_divUR_MM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR_MM"></button></div>
<br>
<br>
<div id="chart_divUR_YY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR_YY"></button></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divGrowth_10" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divGrowth_10"></button></div>

</body>
</html>