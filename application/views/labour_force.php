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

            var data = new google.visualization.DataTable(<?= $labour_force_mm ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                hAxis: { title: 'Month',
                        showTextEvery: 1,
                        slantedText: 'true',
                        slantedTextAngle: 45,
                        gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divLF_MM'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_LF_MM').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $labour_force_yy ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divLF_YY'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chart_LF_YY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
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
                title: "Employment M-M Trends",
                height: 400,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divEM_MM'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chartEM_MM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
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
                title: "Employment Y-Y Trends",
                height: 400,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divEM_YY'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chartEM_YY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $unemployment_yy ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divUM_MM'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chartUM_MM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $unemployment_yy ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force'},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divUM_YY'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_chartUM_YY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>
</head>

<body>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="chart_divLF_MM" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chart_LF_MM"></button></div>
    </div>
    <div class="col-md-6">
        <div id="chart_divLF_YY" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chart_LF_YY"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="chart_divEM_MM" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartEM_MM"></button></div>
    </div>

    <div class="col-md-6">
        <div id="chart_divEM_YY" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartEM_YY"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="chart_divUM_MM" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartUM_MM"></button></div>
    </div>

    <div class="col-md-6">
        <div id="chart_divUM_YY" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartUM_YY"></button></div>
    </div>
</div>

</body>
</html>