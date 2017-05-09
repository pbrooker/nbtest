<script type="text/javascript">

    // Load the Visualization API
    google.load('visualization', '1', {'packages':['table']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawTable);

    function drawTable() {

        var data = new google.visualization.DataTable(<?= $lmi_main_data['data'] ;?>);
        var title = "Labour Force Statistics: <?= $lmi_main_data['date'] ;?>";

        var options = {
            title:  title,
            height: 400,
            width: 1200,
            interpolateNulls: false
        };
        // Instantiate and draw our chart, passing in some options.
        var table = new google.visualization.Table(document.getElementById('lmi_main'));

        var formatter = new google.visualization.ArrowFormat();
        formatter.format(data, 4);
        formatter.format(data, 5);
        formatter.format(data, 6);
        formatter.format(data, 7);

        $('#get_lmi_main') .on('click', function() {

            var csvFormattedDataTable = google.visualization.dataTableToCsv(data);
            var encodedUri = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csvFormattedDataTable);
            this.href = encodedUri;
            this.download = 'lf_main_NB_All';

        });

        table.draw(data, options);
    }

</script>

<script type="text/javascript" id="loaded_chart"></script>