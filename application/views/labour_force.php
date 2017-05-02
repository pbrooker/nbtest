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
            var title = "Labour Force Statistics: <?= $labour_force_statistics['date'] ;?>";

            var options = {
                title:  title,
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
                width: 600,
                hAxis: { title: 'Month',
                        showTextEvery: 1,
                        slantedText: 'true',
                        slantedTextAngle: 45,
                        gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:400000,
                        min:370000
                    }},
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
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:400000,
                        min:370000
                    }},
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
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:370000,
                        min:340000
                    }},
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
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:370000,
                        min:340000
                    }},
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

            var data = new google.visualization.DataTable(<?= $unemployment_mm ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:12,
                        min:6
                    }},
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
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:12,
                        min:6
                    }},
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

    <!-- Southeast Charts Start -->
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $southeast['se_lf_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $southeast['se_lf_stats']['date'] ;?> - <?= $southeast['se_lf_stats']['title'];?>";

            var options = {
                title:  title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('se_lf_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $southeast['se_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:125000,
                        min:100000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southeast['se_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:123000,
                        min:100000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southeast['se_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:115000,
                        min:95000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southeast['se_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:115000,
                        min:95000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southeast['se_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southeast['se_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('se_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_se_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }

    </script>

    <!-- Southeast Charts End -->

    <!-- Southwest Charts Start -->
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $southwest['sw_lf_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $southwest['sw_lf_stats']['date'] ;?> - <?= $southwest['sw_lf_stats']['title'];?>";

            var options = {
                title: title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('sw_lf_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $southwest['sw_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:100000,
                        min:80000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southwest['sw_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:100000,
                        min:80000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southwest['sw_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:95000,
                        min:75000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southwest['sw_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:95000,
                        min:75000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southwest['sw_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $southwest['sw_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('sw_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_sw_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }
    </script>
    <!-- Southwest Charts End -->

    <!-- Central Charts Start -->
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $central['ce_lf_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $central['ce_lf_stats']['date'] ;?> - <?= $central['ce_lf_stats']['title'];?>";

            var options = {
                title: title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('ce_lf_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $central['ce_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:80000,
                        min:65000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $central['ce_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:80000,
                        min:65000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $central['ce_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:75000,
                        min:60000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $central['ce_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:75000,
                        min:60000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $central['ce_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $central['ce_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ce_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ce_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }
    </script>
    <!-- Central Charts End -->

    <!-- Northwest Charts Start -->
        <script type="text/javascript">

            // Load the Visualization API and the piechart package.
            google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $northwest['nw_lf_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $northwest['nw_lf_stats']['date'] ;?> - <?= $northwest['nw_lf_stats']['title'];?>";

            var options = {
                title: title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('nw_lf_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $northwest['nw_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:50000,
                        min:35000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northwest['nw_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:50000,
                        min:35000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northwest['nw_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:45000,
                        min:30000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northwest['nw_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:45000,
                        min:30000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northwest['nw_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northwest['nw_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:15,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('nw_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_nw_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }
    </script>
    <!-- Northwest Charts End -->

    <!-- Northeast Charts Start -->
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $northeast['ne_lf_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $northeast['ne_lf_stats']['date'] ;?> - <?= $northeast['ne_lf_stats']['title'];?>";

            var options = {
                title: title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('ne_lf_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $northeast['ne_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:85000,
                        min:60000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northeast['ne_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:85000,
                        min:60000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northeast['ne_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:75000,
                        min:50000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northeast['ne_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:75000,
                        min:50000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northeast['ne_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:25,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $northeast['ne_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:25,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('ne_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_ne_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }
    </script>
    <!-- Northeast Charts End -->

    <!-- Youth Charts Start -->
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['table']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawTable);

        function drawTable() {

            var data = new google.visualization.DataTable(<?= $youth['youth_stats']['data'] ;?>);
            var title = "Labour Force Statistics: <?= $youth['youth_stats']['date'] ;?> - <?= $youth['youth_stats']['title'];?>";

            var options = {
                title: title,
                height: 400,
                width: 1200,
                interpolateNulls: false
            };
            // Instantiate and draw our chart, passing in some options.
            var table = new google.visualization.Table(document.getElementById('youth_stats'));

            var formatter = new google.visualization.ArrowFormat();
            formatter.format(data, 4);
            formatter.format(data, 5);
            formatter.format(data, 6);
            formatter.format(data, 7);

            table.draw(data, options);
        }

    </script>

    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable(<?= $youth['yt_lf_mm'] ;?>);

            var options = {
                title: "Labour Force M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:80000,
                        min:40000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_lf_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_lf_mm').innerHTML = '<a href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $youth['yt_lf_yy'] ;?>);

            var options = {
                title: "Labour Force Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:80000,
                        min:40000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_lf_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_lf_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $youth['yt_em_mm'] ;?>);

            var options = {
                title: "Employment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:70000,
                        min:30000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_em_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_em_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $youth['yt_em_yy'] ;?>);

            var options = {
                title: "Employment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:70000,
                        min:30000
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_em_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_em_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $youth['yt_um_mm'] ;?>);

            var options = {
                title: "Unemployment M-M Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:25,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_um_mm'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_um_mm').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

            var data = new google.visualization.DataTable(<?= $youth['yt_um_yy'] ;?>);

            var options = {
                title: "Unemployment Y-Y Trends",
                height: 400,
                width: 600,
                hAxis: { title: 'Month',
                    showTextEvery: 1,
                    slantedText: 'true',
                    slantedTextAngle: 45,
                    gridlines: {count: 12}
                },
                vAxis: { title: 'Labour Force', viewWindowMode:'explicit',
                    viewWindow:{
                        max:25,
                        min:0
                    }},
                legend:"none",
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('yt_um_yy'));

            google.visualization.events.addListener(chart, 'ready', function () {
                document.getElementById('get_yt_um_yy').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
            });
            chart.draw(data, options);
        }
    </script>

    <!-- Youth Charts End -->

</head>

<body>
<br>
<br>
<!--  Overall Charts Start -->

<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $labour_force_statistics['date'];?></h2>
    <div id="table_divLF_main" style="width: 100%"></div>
    <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
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
<div class="col-md-12" style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="chart_divUM_MM" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartUM_MM"></button></div>
    </div>

    <div class="col-md-6">
        <div id="chart_divUM_YY" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_chartUM_YY"></button></div>
    </div>
</div>

<!-- Overall Charts End -->
<br>
<br>

<!-- Youth Charts Start -->
<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $labour_force_statistics['date'];?> - Youth</h2>
    <div id="youth_stats" style="width: 100%"></div>
    <label for="youth_stats">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="yt_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="yt_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="yt_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="yt_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="yt_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_um_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="yt_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_yt_um_yy"></button></div>
    </div>
</div>
<!-- Youth Charts End -->
<!-- Southeast Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $southeast['se_lf_stats']['date'];?> - <?= $southeast['se_lf_stats']['title'];?></h2>
    <div id="se_lf_stats" style="width: 100%"></div> <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>

</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="se_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="se_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="se_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="se_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="se_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_um_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="se_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_se_um_yy"></button></div>
    </div>
</div>

<!-- Southeast Charts End -->
<br>
<br>
<!-- Southwest Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $southwest['sw_lf_stats']['date'];?> - <?= $southwest['sw_lf_stats']['title'];?></h2>
    <div id="sw_lf_stats" style="width: 100%"></div>
    <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="sw_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="sw_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="sw_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="sw_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="sw_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_um_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="sw_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_sw_um_yy"></button></div>
    </div>
</div>


<!-- Southwest Charts End -->
<br>
<br>
<!-- Central Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $central['ce_lf_stats']['date'];?> - <?= $central['ce_lf_stats']['title'];?></h2>
    <div id="ce_lf_stats" style="width: 100%"></div>
    <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="ce_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="ce_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="ce_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="ce_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="ce_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_um_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="ce_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ce_um_yy"></button></div>
    </div>
</div>


<!-- Central Charts End -->
<br>
<br>
<!-- Northwest Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
    <h2>Labour Force Statistics: <?= $northwest['nw_lf_stats']['date'];?> - <?= $northwest['nw_lf_stats']['title'];?></h2>
    <div id="nw_lf_stats" style="width: 100%"></div>
    <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="nw_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="nw_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="nw_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="nw_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="nw_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_um_mm"></button></div>
    </div>

    <div class="col-md-6"  style="margin-bottom: 20px">
        <div id="nw_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_nw_um_yy"></button></div>
    </div>
</div>


<!-- Northwest Charts End -->
<br>
<br>
<!-- Northeast Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%;">
    <h2>Labour Force Statistics: <?= $northeast['ne_lf_stats']['date'];?> - <?= $northeast['ne_lf_stats']['title'];?></h2>
    <div id="ne_lf_stats" style="width: 100%"></div>
    <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
    <div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div id="ne_lf_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_lf_mm"></button></div>
    </div>
    <div class="col-md-6">
        <div id="ne_lf_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_lf_yy"></button></div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div id="ne_em_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_em_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="ne_em_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_em_yy"></button></div>
    </div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
    <div class="col-md-6">
        <div id="ne_um_mm" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_um_mm"></button></div>
    </div>

    <div class="col-md-6">
        <div id="ne_um_yy" style="width: 100%"></div>
        <div style="margin-left: 50px"><button id="get_ne_um_yy"></button></div>
    </div>
</div>


<!-- Northeast Charts End -->



</body>
</html>