<!--  Overall Charts Start -->

<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $labour_force_statistics['date'];?></h2>
	<div id="table_divLF_main" style="width: 100%"></div>
	<label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="chart_divLF_MM" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chart_LF_MM"></button></div>
	</div>
	<div class="col-md-6">
		<div id="chart_divLF_YY" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chart_LF_YY"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="chart_divEM_MM" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chartEM_MM"></button></div>
	</div>

	<div class="col-md-6">
		<div id="chart_divEM_YY" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chartEM_YY"></button></div>
	</div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="chart_divUM_MM" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chartUM_MM"></button></div>
	</div>

	<div class="col-md-6">
		<div id="chart_divUM_YY" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_chartUM_YY"></button></div>
	</div>
</div>

<!-- Overall Charts End -->

<!-- Participation Charts -->

<!--Div that will hold the chart-->
<div class="col-md-12">
<div id="chart_participation" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_participation"></button></div>
</div>
<br>
<br>
<div class="col-md-12">
<div id="chart_divMM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divMM"></button></div>
</div>
<br>
<br>
<div class="row">
<div id="chart_divYY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divYY"></button></div>
</div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div class="row">
<div id="chart_divERMM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divERMM"></button></div>
</div>
<br>
<br>
<div class="row">
<div id="chart_divERYY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divERYY"></button></div>
</div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divUR" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR"></button></div>
<br>
<br>
<div id="chart_divUR_MM" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR_MM"></button></div>
<br>
<br>
<div id="chart_divUR_YY" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divUR_YY"></button></div>
<br>
<br>
<div style="width: 100%; background-color: #1f1d1d; height: 5px"></div>
<br>
<br>
<div id="chart_divGrowth_10" style="width: 90%"></div>
<div style="margin-left: 100px"><button id="get_chart_divGrowth_10"></button></div>

<!-- participation Charts End -->

<br>
<br>

<!-- Youth Charts Start -->
<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $youth['youth_stats']['date'];?> - Youth</h2>
	<div id="youth_stats" style="width: 100%"></div>
	<label for="youth_stats">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="yt_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="yt_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="yt_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="yt_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="yt_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_um_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="yt_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_yt_um_yy"></button></div>
	</div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
    <div id="p_youth" style="width: 100%"></div>
    <div style="margin-left: 50px"><button id="get_p_youth"></button></div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
    <div id="um_rate_yt" style="width: 100%"></div>
    <div style="margin-left: 50px"><button id="get_um_rate_yt"></button></div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
    <div id="er_mm_yt" style="width: 100%"></div>
    <div style="margin-left: 50px"><button id="get_er_mm_yt"></button></div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
    <div id="er_yy_yt" style="width: 100%"></div>
    <div style="margin-left: 50px"><button id="get_er_yy_yt"></button></div>
</div>
<!-- Youth Charts End -->
<!-- Southeast Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $southeast['se_lf_stats']['date'];?> - <?= $southeast['se_lf_stats']['title'];?></h2>
	<div id="se_lf_stats" style="width: 100%"></div> <label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>

</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="se_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="se_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="se_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="se_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="se_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_um_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="se_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_se_um_yy"></button></div>
	</div>
</div>

<!-- Southeast Charts End -->
<br>
<br>
<!-- Southwest Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $southwest['sw_lf_stats']['date'];?> - <?= $southwest['sw_lf_stats']['title'];?></h2>
	<div id="sw_lf_stats" style="width: 100%"></div>
	<label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="sw_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="sw_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="sw_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="sw_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="sw_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_um_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="sw_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_sw_um_yy"></button></div>
	</div>
</div>


<!-- Southwest Charts End -->
<br>
<br>
<!-- Central Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $central['ce_lf_stats']['date'];?> - <?= $central['ce_lf_stats']['title'];?></h2>
	<div id="ce_lf_stats" style="width: 100%"></div>
	<label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="ce_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="ce_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="ce_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="ce_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="ce_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_um_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="ce_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ce_um_yy"></button></div>
	</div>
</div>


<!-- Central Charts End -->
<br>
<br>
<!-- Northwest Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%">
	<h2>Labour Force Statistics: <?= $northwest['nw_lf_stats']['date'];?> - <?= $northwest['nw_lf_stats']['title'];?></h2>
	<div id="nw_lf_stats" style="width: 100%"></div>
	<label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="nw_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="nw_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="nw_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="nw_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="nw_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_um_mm"></button></div>
	</div>

	<div class="col-md-6"  style="margin-bottom: 20px">
		<div id="nw_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_nw_um_yy"></button></div>
	</div>
</div>


<!-- Northwest Charts End -->
<br>
<br>
<!-- Northeast Charts Start -->
<br>
<br>

<div class="col-md-12" style="width: 100%;">
	<h2>Labour Force Statistics: <?= $northeast['ne_lf_stats']['date'];?> - <?=  $northeast['ne_lf_stats']['title'];?></h2>
	<div id="ne_lf_stats" style="width: 100%"></div>
	<label for="table_divLF_main">M-M = month over month. Y-Y = year over year. The coloured line in the charts below represents the linear trend line.</label>
	<div class="text-center" style="width: 100%; background-color: #F6C01F; font-weight: bold">It is recommended to consider trends over the long-term.</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div id="ne_lf_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_lf_mm"></button></div>
	</div>
	<div class="col-md-6">
		<div id="ne_lf_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_lf_yy"></button></div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div id="ne_em_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_em_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="ne_em_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_em_yy"></button></div>
	</div>
</div>
<div class="col-md-12"  style="margin-bottom: 20px">
	<div class="col-md-6">
		<div id="ne_um_mm" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_um_mm"></button></div>
	</div>

	<div class="col-md-6">
		<div id="ne_um_yy" style="width: 100%"></div>
		<div style="margin-left: 50px"><button id="get_ne_um_yy"></button></div>
	</div>
</div>


<!-- Northeast Charts End -->
