<html>

<head>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $labour_force_statistics['data'] ;?>);


            var options = {
                title: "Labour Force Statistics: " + "<?= $labour_force_statistics['date'] ;?>",
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('table_divLF_main'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            var row7 = data.getRowProperties(6);
            var row8 = data.getRowProperties(7);
            var row9 = data.getRowProperties(8);


            table.draw(data, options);
        }

    </script>

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
<br>
<br>

<div class="col-md-12" style="width: 100%">
    <div id="table_divLF_main" style="width: 100%"></div>
</div>

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