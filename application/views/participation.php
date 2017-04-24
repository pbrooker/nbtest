<html>

<head>


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $participation ;?>);

            var options = {
                title: "Participation Rate",
                height: 400,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_divP'));
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>


    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
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
            chart.draw(data, options);
        }

    </script>
</head>

<body>
<!--Div that will hold the chart-->
<div id="chart_divP" style="width: 90%"></div>
<br>
<br>
<div id="chart_divMM" style="width: 90%"></div>
<br>
<br>
<div id="chart_divYY" style="width: 90%"></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divERMM" style="width: 90%"></div>
<br>
<br>
<div id="chart_divERYY" style="width: 90%"></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divUR" style="width: 90%"></div>
<br>
<br>
<div id="chart_divUR_MM" style="width: 90%"></div>
<br>
<br>
<div id="chart_divUR_YY" style="width: 90%"></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divGrowth_10" style="width: 90%"></div>

</body>
</html>