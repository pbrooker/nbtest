(function(custom_chart, $, undefined) {

    custom_chart.Init = function() {



        // $('#barChart').validate({
        //     ignore: [],
        //     rules: {
        //         characteristic: {
        //             required: true
        //         },
        //         compAnswer: {
        //             required: true
        //         },
        //         ageAnswer: {
        //             required: true
        //         },
        //
        //
        //     },
        //     messages: {
        //         first_name: {
        //             required: "Please select the start date"
        //         },
        //         last_name: {
        //             required: "Please select the end date"
        //         },
        //     },
        //     errorPlacement: function (error, element) {},
        //     submitHandler: function(form){
        //         form.submit();
        //     }
        // });

        $('.selectAll').click(function() {
            $(this.form.elements).filter('.location').prop('checked', this.checked);
        });

    };



    // custom_chart.GoogleCharts = function(chartdata) {
    //
    //     google.charts.load('current', {
    //         'packages': ['corechart']
    //     });
    //     google.charts.setOnLoadCallback(drawChart);
    //
    //
    //     function drawChart() {
    //
    //         var data = new google.visualization.DataTable();
    //         var response = chartdata;
    //
    //         data.addColumn('string', 'source');
    //         data.addColumn('number', 'count');
    //
    //         for (var value in response) {
    //             data.addRow([response[value].name, response[value].count]);
    //         }
    //
    //         // job board colours
    //         var slices = [];
    //         for (var value in response) {
    //             slices.push(response[value].colour);
    //         }
    //
    //         var options = {
    //             chartArea: {
    //                 left: 100,
    //                 width: '95%',
    //                 height: '95%'
    //             },
    //             pieHole: 0.5,
    //             legend: 'none',
    //             colors: slices
    //
    //         };
    //
    //         if (document.getElementById('piechart')) {
    //             var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    //             chart.draw(data, options);
    //         }
    //     }
    // };



}(window.custom_chart = window.custom_chart || {}, jQuery));
