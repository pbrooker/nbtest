(function(custom_chart, $, undefined) {

    custom_chart.Init = function() {

        $.validator.setDefaults({
            ignore: ""
        });

        $('#barChart').validate({
            ignore: "",
            rules: {
                characteristic: {
                    required: true
                },
                compAnswer: {
                    required: true
                },
                ageAnswer: {
                    required: true
                },
                location: {
                    required: true
                }

            },
            messages: {
                characteristic: {
                    required: "Please select a characteristic"
                },
                compAnswer: {
                    required: "Please select a comparison type"
                },
                ageAnswer: {
                    required: "Please select an agegroup"
                },
                location: {
                    required: "Please select a location"
                }
            },
            errorPlacement: function (error, element) {
                if( element.is(':radio') || element.is(':checkbox')) {
                    error.appendTo(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form){
                form.submit();
            }
        });


        $('#trendChart').validate({
            ignore: "",
            rules: {
                characteristic: {
                    required: true
                },
                compAnswer: {
                    required: true
                },
                month: {
                  required: true
                },
                year: {
                  required: true
                },
                gender: {
                    require: true
                },
                agegroup: {
                    required: true
                },
                location: {
                    required: true
                }

            },
            messages: {
                characteristic: {
                    required: "Please select a characteristic"
                },
                compAnswer: {
                    required: "Please select a comparison type"
                },
                month: {
                    required: "Please select a month"
                },
                year: {
                    required: "Please select a year"
                },
                agegroup: {
                    required: "Please select an age group"
                },
                gender: {
                  required: "Please select gender"
                },
                location: {
                    required: "Please select a location"
                }
            },
            errorPlacement: function (error, element) {
                if( element.is(':radio') || element.is(':checkbox')) {
                    error.appendTo(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form){
                if($('#trendChart').valid()) {
                    form.submit();
                }

            }
        });

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
