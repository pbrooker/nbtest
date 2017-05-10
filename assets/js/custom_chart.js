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


        $('#trendChart').submit( function(e){
            e.preventDefault(); }).validate ({
            ignore: "",
            rules: {
                characteristic_trend: {
                    required: true
                },
                plotAnswer: {
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
                agegroup_trend: {
                    required: true
                },
                location: {
                    required: true
                }

            },
            messages: {
                characteristic_trend: {
                    required: "Please select a characteristic"
                },
                plotAnswer: {
                    required: "Please select a comparison type"
                },
                month: {
                    required: "Please select a month"
                },
                year: {
                    required: "Please select a year"
                },
                agegroup_trend: {
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

                var process_form = true;

                $('#characteristic_trend').next().removeClass('error');
                if ($('#characteristic_trend').val() == 'disabled') {
                    $('#characteristic_trend').next().addClass('error');
                    process_form = false;
                }

                $('input[name="plotAnswer"]').next().removeClass('error');
                if ($('input[name="plotAnswer"]').val() == null) {
                    $('input[name="plotAnswer"]').next().addClass('error');
                    process_form = false;
                }

                $('#month').next().removeClass('error');
                if ($('#month').val() == 'disabled') {
                    $('#month').next().addClass('error');
                    process_form = false;
                }

                $('#year').next().removeClass('error');
                if ($('#year').val() == 'disabled') {
                    $('#year').next().addClass('error');
                    process_form = false;
                }

                $('input[name="gender"]').next().removeClass('error');
                if ($('input[name="gender"]').val() == null) {
                    $('input[name="gender"]').next().addClass('error');
                    process_form = false;
                }

                $('#agegroup_trend').next().removeClass('error');
                if ($('#agegroup_trend').val() == 'disabled') {
                    $('#agegroup_trend').next().addClass('error');
                    process_form = false;
                }

                $('input[name="location"]').next().removeClass('error');
                if ($('input[name="location"]').val() == null) {
                    $('input[name="location"]').next().addClass('error');
                    process_form = false;
                }

                if(process_form) {

                    jQuery.ajax({
                        type: "POST",
                        data: {
                            "characteristic" : $('#characteristic_trend').val(),
                            "plot_type" : $('input[name="plotAnswer"]').val(),
                            "month" : $('#month').val(),
                            "year" : $('#year').val(),
                            "gender" : $('#agegroup_trend').val(),
                            "agegroup" : $('#agegroup_trend').val(),
                            "location" : $('input[name="location"]').val()

                        },
                        url: nbjobs.base_url + 'Charts/manualTrendChart',
                        success: function(data) {

                        },
                        error: function(error) {

                        }
                    })
                }

            }
        });

        // $("#billing-address-form").submit(function(e) {
        //     e.preventDefault();
        // }).validate({
        //     ignore: ":hidden",
        //     rules: {
        //         "country": {
        //             selectcountry: true
        //         },
        //         "province": {
        //             selectProvince: true
        //         },
        //         "international_province": {
        //             required: { depends: checkIfInternationalVisible }
        //         }
        //     },
        //     submitHandler: function(form){
        //         var process_form = true;
        //         $("#country").next().removeClass('error');
        //         if ($("#country").val() == '0') {
        //             $("#country").next().addClass('error');
        //             process_form = false;
        //         }
        //         $("#province").next().removeClass('error');
        //         if ($("#province").val() == '0') {
        //             $("#province").next().addClass('error');
        //             process_form = false;
        //         }
        //         if ($('#collapse_edit_billing').hasClass('in') && $(e.target).closest('.form-horizontal').length===0) {
        //             $('#collapse_edit_billing').collapse('hide');
        //         }
        //
        //         if(process_form) {
        //             var l = Ladda.create( document.querySelector( '#save_billing_btn' ) );
        //             l.start();
        //             jQuery.ajax({
        //                     type: "POST",
        //                     data: {
        //                         "company_id" : $("#company_id").val(),
        //                         "address" : $("#address").val(),
        //                         "city" : $("#city").val(),
        //                         "postal_code" : $("#postal_code").val(),
        //                         "province" : $("#province").val(),
        //                         "international_province" : $("#international_province").val(),
        //                         "country" : $("#country").val()
        //                     },
        //                     url: Qimple.base_url + "ecommerce/update_billing_address",
        //                     success: function(data) {
        //                         var subAddress = $("#sub_address").html('');
        //                         d = data.result;
        //                         l.stop();
        //                         if (d.address !== "") {
        //                             $("#billing_address").html(d.address);
        //                         }
        //                         if (d.city !== "") {
        //                             subAddress.html(' ' + d.city);
        //                         }
        //                         if (d.postal_code !== "") {
        //                             subAddress.append(' ' + d.postal_code.toUpperCase());
        //                         }
        //                         if (d.province !== "") {
        //                             subAddress.append(' ' + d.province);
        //                         }
        //                         if (d.country !== "") {
        //                             subAddress.append(' ' + d.country);
        //                         }
        //                         if (d.address === "" ) {
        //                             $("#billing_address").html('<span class="panel-underline" style="width: 50px">');
        //                         }
        //
        //                         $("#billing_province").html(d.province.toUpperCase());
        //                         $("#billing_country").html(d.country.toUpperCase());
        //                         $("#billing_currency").html(d.currency);
        //                         $("#panel-billing").removeClass('panel-danger').addClass('panel-default');
        //                         notify(CONFIG.SUCCESS_MESSAGES[700], 'success');
        //                     },
        //                     error: function (error) {
        //                         console.log(error);
        //                         notify(CONFIG.ERROR_MESSAGES[100], 'error');
        //                     }
        //                 }
        //             );
        //         }
        //     }
        // });

        $.validator.addMethod( "selectProvince", function(value, element) {
                if (value === "0"){
                    $('#'+element.id).next().children().addClass('error');
                    return false;
                } else {
                    $('#'+element.id).next().children().removeClass('error');
                    return true;
                }
            }, "Please select a state / province"
        );



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
