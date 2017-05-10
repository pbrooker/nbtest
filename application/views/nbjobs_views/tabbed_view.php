<!-- Holder for primary Statistics Table - by default will always look for last months data -->
<div class="main container">
	<h1>Labour Force Statistics: <?= $date ;?></h1>

	<div class="container">
		<label class="pull-right" for="lmi_main">Date last updated: <?= $last_updated ;?></label>
		<div id="lmi_main"></div>
		<div class="pull-right"><a href="" id="get_lmi_main" download="" class="btn btn-success">Export Table</a></div>
	</div>
</div>

<!-- Custom Chart Tabs -->
<div class="build container">
	<h2>Build your chart</h2>
	<div>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#chart">Current Performance by Province</a></li>
			<li><a data-toggle="tab" href="#trend">Trends Over Time</a></li>
		</ul>
	</div>

	<div class="tab-content container ">
		<div id="chart" class="tab-pane fade in active">
			<br>

			<h4>1. Choose the Labour Force Characteristics</h4>

			<form id="barChart" action="<?=base_url('Charts/manualBarChart');?>" method="post">
                <div class="col-md-6">
                    <select class="form-control col-md-4" id="characteristic">

                    <?php foreach($characteristics_bar as $key => $value): ?>
                        <?php if($key == 'disabled'): ?>
                            <option value="<?= $key;?>" selected disabled><?= $value;?></option>
                        <?php else: ?>
                            <option value="<?= $key;?>"><?= $value;?></option>
                        <?php endif ;?>

                    <?php endforeach;?>

                    </select>
                </div>
                <br>
                <br>

                <h4>2. Choose Comparison Type</h4>

                <?php foreach($comparison_type as $key => $value): ?>

                <div class="radio-inline">
                    <label><input type="radio" name="compAnswer" value="<?= $key ;?>"><?=$value;?> </label>
                </div>

                <?php endforeach;?>

                <h4>3. Select Age Group</h4>
                <?php foreach($agegroup_chart as $key => $value): ?>

                <div class="radio-inline">
                    <label><input type="radio" name="ageAnswer" value="<?= $key ;?>"><?=$value;?> </label>
                </div>

                <?php endforeach; ?>

                <h4>4. Select Location</h4>
                <?php foreach($location as $key => $value):?>

                <div class="checkbox">
                    <label><input type="checkbox" value="<?= $key ;?>"><?= $value ;?></label>
                </div>

                <?php endforeach; ?>

                <button name="button" type="submit" class="btn btn-small btn-primary" disabled="">Generate Chart</button>


            </form>


            <div id="barChartHolder"></div>
            <div class="pull-right"><button class="btn btn-small btn-success hidden" id="getBarChart">Export Graph</button> </div>


        </div>

		<div id="trend" class="tab-pane fade">
			<br>
			<h4>1. Choose the Labour Force Characteristics</h4>

			<form id="trendChart" action="<?= base_url('Charts/manualTrendChart');?>" method="post">
                <div class="col-md-6">
                    <select class="form-control col-md-4" id="characteristic">

                        <?php foreach($characteristics_trend as $key => $value): ?>
                            <?php if($key == 'disabled'): ?>
                                <option value="<?= $key;?>" selected disabled><?= $value;?></option>
                            <?php else: ?>
                                <option value="<?= $key;?>"><?= $value;?></option>
                            <?php endif ;?>

                        <?php endforeach;?>

                    </select>
                </div>
                <br>
                <br>
                <h4>2. Plot Data</h4>

                <?php foreach($plot_type as $key => $value): ?>

                    <div class="radio-inline">
                        <label><input type="radio" name="compAnswer" value="<?= $key ;?>"><?=$value;?> </label>
                    </div>

                <?php endforeach;?>

                <h4>3. Select Date</h4>
                <div class="col-md-8">
                    <div class="col-md-4">
                        <select class="form-control col-md-4" id="month">
                            <?php foreach($months as $key => $value): ?>
                            <?php if($key == 'disabled'): ?>
                                <option value="<?= $key;?>" selected disabled><?= $value;?></option>
                            <?php else: ?>
                                <option value="<?= $key;?>"><?= $value;?></option>
                            <?php endif ;?>

                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select class="form-control col-md-4" id="year">
                            <?php foreach($years as $key => $value): ?>
                                <?php if($key == 'disabled'): ?>
                                    <option value="<?= $key;?>" selected disabled><?= $value;?></option>
                                <?php else: ?>
                                    <option value="<?= $key;?>"><?= $value;?></option>
                                <?php endif ;?>

                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <h4>4. Demographics</h4>
                <div class="col-md-10">
                    <div class="col-md-4">
                        <p>Gender</p>

                        <?php foreach($gender as $key => $value): ?>

                            <div class="radio-inline">
                                <label><input type="radio" name="compAnswer" value="<?= $key ;?>"><?=$value;?> </label>
                            </div>

                        <?php endforeach;?>

                    </div>
                    <div class="col-md-6">
                        <p>Age Group</p>
                        <select class="form-control col-md-4" id="agegroup">
                            <?php foreach($agegroup_trend as $key => $value): ?>
                                <?php if($key == 'disabled'): ?>
                                    <option value="<?= $key;?>" selected disabled><?= $value;?></option>
                                <?php else: ?>
                                    <option value="<?= $key;?>"><?= $value;?></option>
                                <?php endif ;?>

                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <h4>5. Select Location</h4>
                <?php foreach($location as $key => $value):?>

                    <div class="checkbox">
                        <label><input type="checkbox" value="<?= $key ;?>"><?= $value ;?></label>
                    </div>

                <?php endforeach; ?>

                <button name="button" type="submit" class="btn btn-small btn-primary" disabled="">Generate Chart</button>

            </form>

            <div id="trencChartHolder"></div>
            <div class="pull-right"><button class="btn btn-small btn-success hidden" id="getTrendChart">Export Graph</button> </div>

		</div>
	</div>
</div>
