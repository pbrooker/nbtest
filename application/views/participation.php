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
                width: 1200,
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
                width: 1200,
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
                width: 1200,
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
                width: 1200,
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
                width: 1200,
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
</head>

<body>
<!--Div that will hold the chart-->
<div id="chart_divP"></div>
<br>
<br>
<div id="chart_divMM"></div>
<br>
<br>
<div id="chart_divYY"></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divERMM"></div>
<br>
<br>
<div id="chart_divERYY"></div>

</body>
</html>