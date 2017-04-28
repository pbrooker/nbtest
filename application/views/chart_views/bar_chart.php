
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $data ;?>);

        var options = {
            title:  '<?= $title ;?>' ,
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_holder'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>