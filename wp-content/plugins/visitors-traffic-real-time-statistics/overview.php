
<script language="javascript" type="text/javascript">
    function imgFlagError(image) {
        image.onerror = "";
        image.src = "<?php echo plugins_url('/images/flags/noFlag.png', AHCFREE_PLUGIN_MAIN_FILE) ?>";
        return true;
    }
</script>
<?php
$custom_timezone_offset = ahcfree_get_current_timezone_offset();
$custom_timezone_string = ahcfree_get_timezone_string();
if ($custom_timezone_string) {
    $custom_timezone = new DateTimeZone(ahcfree_get_timezone_string());
}

$myend_date = new DateTime();
$myend_date->setTimezone($custom_timezone);
$myend_date_full = $myend_date->format('Y-m-d H:i:s');
$myend_date = $myend_date->format('Y-m-d');

$mystart_date = new DateTime($myend_date);
$mystart_date->modify(' - ' . (AHC_VISITORS_VISITS_LIMIT - 1) . ' days');
$mystart_date->setTimezone($custom_timezone);
$mystart_date_full = $mystart_date->format('Y-m-d H:i:s');
$mystart_date = $mystart_date->format('Y-m-d');
?>
<div class="ahcfree_main_container" >

    <h1><img height="55px" src="<?php echo plugins_url('/images/logo.png', AHCFREE_PLUGIN_MAIN_FILE) ?>">&nbsp;Visitors Traffic Real Time Statistics free &nbsp;<small>Version: 1.7</small>&nbsp;<a title="change settings" href="admin.php?page=ahc_hits_counter_settings"><img src="<?php echo plugins_url('/images/settings.jpg', AHCFREE_PLUGIN_MAIN_FILE) ?>" /></a></h1><br />
  
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel" >
                 <h2 style="height:35px !important; font-size:13px !important" >Hits in last <?php echo AHC_VISITORS_VISITS_LIMIT ?> days</h2>
                 
                <div class="panelcontent"  id="visitors_graph_stats">
                    <div id="visitscount" style="height:400px;"></div>
                </div>
            </div>

        </div>
    </div>
   
  
    <div class="row">
        <div class="col-md-6">
            <!-- browsers chart panel -->
            <div class="panel">
                <h2 style="height:35px !important; font-size:13px !important"><?php echo ahc_browsers ?></h2>
				<div class="panelcontent">
					<div class="row">
								<div class="col-md-8" >
									<canvas id="brsBiechartContainer" height="200px"></canvas>
								</div>
								<div class="col-md-4">
									<div class="legendsContainer" id="browsersLegContainer"></div>
			
								</div>
					
							
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-6">
            <!-- search engines chart panel -->
           
			
			<div class="panel">
                <h2 style="height:35px !important; font-size:13px !important"><?php echo ahc_browsers ?></h2>
				<div class="panelcontent">
					<div class="row">
								<div class="col-md-8" >
									<canvas id="srhEngBieChartContainer" height="200px"></canvas>
								</div>
								<div class="col-md-4">
									<div class="legendsContainer" id="srchEngLegContainer">
			
								</div>
					
							
					</div>
				</div>
			</div>
			
			
			
			
        </div>
    </div>
   </div>
    <canvas id="countriesPiechartContainer" height="0"></canvas>
    <div class="row">
        <!-- traffic by title -->
        <div class="col-md-6">
            <?php
            $tTitles = ahcfree_get_traffic_by_title();
            ?>
            <div class="panel">
                <h2 style="height:35px !important; font-size:13px !important"><?php echo traffic_by_title ?></h2>
                <div class="panelcontent" style="padding-right: 50px;">
                    <table width="100%" border="0" cellspacing="0">
                        <tr>
                            <th width="5%"><?php echo ahcfree_rank ?></th>
                            <th width="65%"><?php echo ahcfree_title ?></th>
                            <th width="15%"><?php echo ahc_hits ?></th>
                            <th width="15%"><?php echo ahcfree_percent ?></th>
                        </tr>
                        <?php
                        if (is_array($tTitles)) {
                            foreach ($tTitles as $t) {
                                ?>
                                <tr>
                                    <td  class="values"><?php echo $t['rank'] ?></td>
                                    <td  class="values"><a href="<?php echo get_permalink($t['til_page_id']); ?>" target="_blank"><?php echo $t['til_page_title'] ?></a></td>
                                    <td  class="values"><?php echo ahcfree_free_NumFormat($t['til_hits']); ?></td>
                                    <td  class="values"><?php echo $t['percent'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
          
        <div class="panel">
                <h2 style="height:35px !important; font-size:13px !important"><?php echo ahc_refering_sites ?></h2>
                <div class="panelcontent" >
                    <table width="95%" border="0" cellspacing="0">
                        <tr>
                            <th width="70%"><?php echo ahcfree_site_name ?></th>
                            <th width="30%"><?php echo ahcfree_total_times ?></th>
                        </tr>

                        <?php
                        $googlehits = 0;
						$rets = '';
                        $referingSites = ahcfree_get_top_refering_sites();
                        if (is_array($referingSites)) {
                            foreach ($referingSites as $site) {
                                if (strpos($site['site_name'], 'google')) {
                                    $googlehits += $site['total_hits'];
                                } else {

                                    $rets .= '<tr>
						<td  class="values">' . $site['site_name'] . '&nbsp;<a href="http://' . str_replace('http://', '', $site['site_name']) . '" target="_blank"><img src="' . plugins_url('/images/openW.jpg', AHCFREE_PLUGIN_MAIN_FILE) . '" title="' . ahcfree_view_referer . '"></a></td>
						<td  class="values">' . $site['total_hits'] . '</td>
						</tr>';
                                }
                            }
                            if ($googlehits > 0) {
                                echo '<tr>
						<td  class="values">www.google.com&nbsp;<a href="http://www.google.com" target="_blank"><img src="' . plugins_url('/images/openW.jpg', AHCFREE_PLUGIN_MAIN_FILE) . '" title="' . ahcfree_view_referer . '"></a></td>
						<td  class="values">' . $googlehits . '</td>
					  </tr>';
                            }
                            echo $rets;
                        }
                        ?>
                    </table>
                </div>
            </div>
       
        </div>
		
		
	  
    </div>
	
    <?php
		$visits_visitors_data = ahcfree_get_visits_by_custom_duration_callback($mystart_date,$myend_date,$stat='');
    ?>
    
    <br />
	<hr />
	<center>
      <a target="_blank" href="https://www.wp-buy.com/product/visitors-traffic-real-time-statistics-pro">
         <p style="color:#00F; font-size:15px;">if you need more statistics you can upgrade to professional version now, The premium version of visitors traffic real time statistics is completely different from the free version as there are a lot more features included.</p>
        
         <p><img style="border:#CCC solid 1px; margin-right:30px" height="auto" src="<?php echo plugins_url('/images/upgradenow-button.png', AHCFREE_PLUGIN_MAIN_FILE) ?>" /><img style="border:#CCC solid 1px"  src="<?php echo plugins_url('/images/widget.png', AHCFREE_PLUGIN_MAIN_FILE) ?>" /></p>
      </a>
	  </center>
    <script language="javascript" type="text/javascript">

       
        
        function drawVisitsLineChart( start_date, end_date, interval, visitors, visits, duration ) {
			
            var visit_chart;
             
            var visit_data_line = visits;
            var visitor_data_line = visitors;
                        
            jQuery(document).ready(function ()
            {
				var high_visit = 0;
				for(var k = 0; k < visit_data_line.length; k++)
				{
					if(high_visit < parseInt(visit_data_line[k][1]))
					{
						high_visit = parseInt(visit_data_line[k][1]);
					}
				}
				if( high_visit > 5 ){
					high_visit = high_visit + 5;
				}
				
				var interval_formatString;
				if(duration == '365')
				{
					interval_formatString = '%b';
				}
				else if(duration == '0')
				{
					interval_formatString = '%b/%Y';
				}
				else
				{
					interval_formatString = '%d/%m';
				}
				
				var numberTicks_val = visit_data_line.length;
								
                jQuery('#visitscount').empty();
                //var visit_data_line = getVisitsByDate( full_start_date, full_end_date, interval );
                //var visitor_data_line = getVisitorsByDate( full_start_date, full_end_date, interval );
                              
                visit_chart = jQuery.jqplot('visitscount', [visit_data_line, visitor_data_line], {
                    title: {
                        text: '',
                        fontSize: '10px',
                        fontFamily: 'Tahoma',
                        textColor: '#000000',
                    },
                    axes: {
                        xaxis: {
                            min: start_date,
                            max: end_date,
                            //tickInterval: interval,
                            numberTicks: numberTicks_val,
                            renderer: jQuery.jqplot.DateAxisRenderer,
                            tickRenderer: jQuery.jqplot.CanvasAxisTickRenderer,
                            tickOptions: {
                                angle: -40,
                                formatString: interval_formatString,
                                showGridline: true,
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: high_visit,
                            padMin: 1.0,
                            label: '',
                            labelRenderer: jQuery.jqplot.CanvasAxisLabelRenderer,
                            labelOptions: {
                                angle: -100,
                                fontSize: '12px',
                                fontFamily: 'Tahoma',
                                fontWeight: 'bold',
                            },
                            tickOptions: {
								formatString: "%d"
							}
                        }
                    },
                    legend: {
                        show: true,
                        location: 's',
                        placement: 'outsideGrid',
                        labels: ['Visit', 'Visitor'],
                        renderer: jQuery.jqplot.EnhancedLegendRenderer,
                        rendererOptions:
                                {
                                    numberColumns: 2,
                                    disableIEFading: false,
                                    border: 'none',
                                },
                    },
                    highlighter: {
                        show: true,
                        bringSeriesToFront: true,
                        tooltipAxes: 'xy',
                        formatString: '%s:&nbsp;<b>%i</b>&nbsp;',
                        tooltipContentEditor: tooltipContentEditor,
                    },
                    grid: {
                        drawGridlines: true,
                        borderColor: 'transparent',
                        shadow: false,
                        drawBorder: false,
                        shadowColor: 'transparent'
                    },
                });
                function tooltipContentEditor(str, seriesIndex, pointIndex, plot) {
                    // display series_label, x-axis_tick, y-axis value
                    return "<b>"+plot.legend.labels[seriesIndex] + "</b><br>" + str;
                   
                }

                jQuery(window).resize(function () {
                    JQPlotVisitChartLengendClickRedraw()
                });
                function JQPlotVisitChartLengendClickRedraw() {
                    visit_chart.replot({resetAxes: ['yaxis']});

                    jQuery('div[id="visitscount"] .jqplot-table-legend').click(function () {
                        JQPlotVisitChartLengendClickRedraw();
                    });
                }

                jQuery('div[id="visitscount"] .jqplot-table-legend').click(function () {
                    JQPlotVisitChartLengendClickRedraw()
                });
            });
        }
        
        
        var mystart_date = "<?php echo $mystart_date;?>";
        var myend_date = "<?php echo $myend_date; ?>";
        var mystart_date_full = "<?php echo $mystart_date_full;?>";
        var myend_date_full = "<?php echo $myend_date_full; ?>";
        var browsersData = <?php echo json_encode(ahcfree_get_browsers_hits_counts()); ?>;
        var srhEngVisitsData = <?php echo json_encode(ahcfree_get_serch_visits_by_date()); ?>;
        var countriesData = <?php echo json_encode(ahcfree_get_top_countries(10)); ?>;
        var visits_data = <?php echo json_encode($visits_visitors_data['visits']);?>;
        var visitors_data = <?php echo json_encode($visits_visitors_data['visitors']);?>;
        console.log(visits_data);
        console.log(visitors_data);
        jQuery(document).ready(function () {
            //------------------------------------------
            //if(visitsData.success && typeof visitsData.data != 'undefined'){
			var duration = jQuery('#hits-duration').val();
            drawVisitsLineChart( mystart_date, myend_date, '1 day', visitors_data, visits_data, duration );
            //}
            //------------------------------------------
            if (browsersData.success && typeof browsersData.data != 'undefined' && typeof drawBrowsersBieChart === "function") {
                drawBrowsersBieChart(browsersData.data);
            }
            //------------------------------------------
            if (srhEngVisitsData.success && typeof srhEngVisitsData.data != 'undefined' && typeof drawSrhEngVstLineChart === "function") {
                drawSrhEngVstLineChart(srhEngVisitsData);
            }
            //------------------------------------------
           
            //------------------------------------------

        });
       
        
        
    </script>
