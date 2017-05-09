<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Start Overall Reports and Participation Charts -->
<script type="text/javascript">

    // Load the Visualization API
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

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_mm_trend ;?>);

        var options = {
            title: "Employment Rate M-M",
            height: 400,
            vAxis: { format: 'short' },
            bar: {groupWidth: 25},
            legend: { position: "none" },
            vAxis: {
                textPosition: 'none',
                viewWindowMode:'explicit',
                viewWindow: {
                    max:2
                }
            },
            annotations: {
                textStyle: {
                    color: 'black',
                    fontSize: 10
                },
                alwaysOutside: true
            }
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERMM'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divERMM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_yy_trend ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERYY'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divERYY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>


<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $unemployment_mm_trend ;?>);

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

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $unemployment_yy_trend ;?>);

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
<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $participation ;?>);

        var options = {
            title: "Participation Rate",
            height: 400,
            bar: {groupWidth: 25},
            legend: { position: "none" },
            vAxis: {
                viewWindowMode:'explicit',
                viewWindow: {
                    max:100,
                    min:50
                }
            },
            annotations: {
                textStyle: {
                    color: 'black',
                    fontSize: 10
                },
                alwaysOutside: true
            }
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_participation'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_participation').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

        var data = new google.visualization.DataTable(<?= $participation_mm ;?>);

        var options = {
            title: "Participation Rate M-M",
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divMM'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divMM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
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

        var data = new google.visualization.DataTable(<?= $participation_yy ;?>);

        var options = {
            title: "Participation Rate Y-Y",
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divYY'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divYY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_mm ;?>);

        var options = {
            title: "Employment Rate M-M",
            height: 400,
            vAxis: { format: 'short' },
            bar: {groupWidth: 25},
            legend: { position: "none" },
            vAxis: {
                textPosition: 'none',
                viewWindowMode:'explicit',
                viewWindow: {
                    max:2
                }
            },
            annotations: {
                textStyle: {
                    color: 'black',
                    fontSize: 10
                },
                alwaysOutside: true
            }
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERMM'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divERMM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_yy ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divERYY'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divERYY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_ur ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divUR').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_urMM ;?>);

        var options = {
            title: "Unemployment Rate M-M",
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR_MM'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divUR_MM').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $employment_urYY ;?>);

        var options = {
            title: "Unemployment Rate Y-Y",
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divUR_YY'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divUR_YY').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>


<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $growth_10yr ;?>);

        var options = {
            title: "Employment growth over the last ten years",
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_divGrowth_10'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_chart_divGrowth_10').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
    }

</script>

<!-- End overall  and participation charts -->


<!-- Youth Charts Start -->
<script type="text/javascript">

    google.load('visualization', '1', {'packages':['table']});

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

    google.load('visualization', '1', {'packages':['corechart']});

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

<script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable(<?= $participation_youth ;?>);

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
        var chart = new google.visualization.ColumnChart(document.getElementById('p_youth'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('get_p_youth').innerHTML = '<a  href="' + chart.getImageURI() + '">Get Image</a>';
        });
        chart.draw(data, options);
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



<!-- Youth Charts End -->

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

        var data = new google.visualization.DataTable(<?=  $southeast['se_lf_yy'] ;?>);

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

        var data = new google.visualization.DataTable(<?=  $southeast['se_em_mm'] ;?>);

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

        var data = new google.visualization.DataTable(<?=  $southeast['se_em_yy'] ;?>);

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

        var data = new google.visualization.DataTable(<?=  $southeast['se_um_mm'] ;?>);

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

        var data = new google.visualization.DataTable(<?=  $southeast['se_um_yy'] ;?>);

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
