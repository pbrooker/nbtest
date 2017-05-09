<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(draw_P_Chart);

    function draw_P_Chart() {

        var p_data = new google.visualization.DataTable(<?= $participation_youth ;?>);

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
        var p_chart = new google.visualization.ColumnChart(document.getElementById('p_youth'));
        google.visualization.events.addListener(p_chart, 'ready', function () {
            document.getElementById('p_youth').innerHTML = '<a  href="' + p_chart.getImageURI() + '">Get Image</a>';
        });
        p_chart.draw(p_data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $um_rate_yt ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('um_rate_yt'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_um_rate_yt').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $er_mm_yt ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('er_mm_yt'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_er_mm_yt').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $er_yy_yt ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('er_yy_yt'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_er_yy_yt').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>