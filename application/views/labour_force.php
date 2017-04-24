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
                hAxis: { title: 'Month'},
                vAxis: { title: 'Labour Force'},
                legend: { position: "none" },
                trendlines: { 0: {} }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_divLF_MM'));
            chart.draw(data, options);
        }

    </script>

</head>

<body>
<!--Div that will hold the chart-->
<div id="chart_divLF_MM" style="width: 90%"></div>
<br>
<br>

</body>
</html>