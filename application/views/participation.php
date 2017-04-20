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
//
//            var data = new google.visualization.DataTable();
//
//            data.addColumn({type: 'string', label: ""});
//            data.addColumn({type: 'number', role: 'interval', label: ""});
//            data.addColumn( {type: 'string', role: 'style'});
//
//	        <?php //foreach ($participation->result() as $key => $value):?>
<!--	        --><?php //if ($key > 0):?>
//
//            data.addRow(['<?//= $value->geography ;?>//', parseFloat(<?//= $value->value ;?>//), "color: #8A62A0"]);
//	        <?php //endif;?>
<!---->
<!--	        --><?php //endforeach;?>
            <?php echo $participation ;?>

            var data = new google.visualization.DataTable(<?= $participation ;?>);

            var options = {
                title: "Participation Rate",
                width: 1200,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" }
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

    </script>

</head>

<body>
<!--Div that will hold the pie chart-->
<div id="chart_div"></div>


</body>
</html>