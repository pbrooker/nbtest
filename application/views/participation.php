<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = new google.visualization.DataTable();

                data.addColumn('string', 'Region');
                data.addColumn({type: 'number', role: 'interval'});
                data.addColumn( {type: 'string', role: 'style'});

				<?php foreach ($participation->result() as $key => $value):?>
				<?php if ($key > 0):?>

                data.addRow(['<?= $value->geography ;?>', parseFloat(<?= $value->value ;?>), "color: #8A62A0"]);
				<?php endif;?>

				<?php endforeach;?>


            var options = {
                title: "Participation Rate",
                width: 1200,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(data, options);
        }
    </script>

</head>

<body>
<!--Div that will hold the pie chart-->
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</body>
</html>