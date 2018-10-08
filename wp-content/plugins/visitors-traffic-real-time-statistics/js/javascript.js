
var colors = ['#DB6946', '#C14543', '#445060', '#395953', '#6C8C80', '#829AB5', '#BF807A', '#BF0000', '#006BB7', '#EC732C', '#BF3D27', '#A6375F',
			'#8C6D46', '#326149', '#802B35', '#8A3842', '#366D73', '#4D6173', '#4A4659', '#C9D65B', '#F45552', '#F3CC5E', '#F29B88', '#D96941',
			'#484F73', '#C9AB81', '#F5655C', '#F0C480'];

			
			var $ = jQuery;
var save_method; //for save method string
var host=window.location.hostname;
var fullpath=window.location.pathname;
var fullparam=window.location.search.split('&');

var firstparam=fullparam[0];
var secoundparam=fullparam[1];

jQuery(document).ready(function () {
	
	

    $(document).on('click', '.SwalBtn1', function() {
        swal.clickConfirm();
    });
    $(document).on('click', '.SwalBtn2', function() {
        window.open(
	  "https://www.wp-buy.com/product/visitors-traffic-real-time-statistics-pro/",
	  '_blank'
	);
       
        swal.clickConfirm();
    });
    $(document).on('click', '.SwalBtn3', function() {
        localStorage.setItem("ahcfree_bool", "1");
        swal.clickConfirm();
    });
  
if(localStorage && (firstparam=="?page=ahc_hits_counter_menu_free"))
{
	

    if (!localStorage.getItem("ahcfree_bool")==true)
    {
		
		
        swal({
        title: "",
		height:'auto',
        //type: "info",
        animation: "slide-from-top",
        html: '<b style="color:red">Upgrade</b> to pro version to see your online counter, Geo locations, Visitors on the map, etc..<br><br><img style="width:80%; min-height:200px" src="https://www.wp-buy.com/wp-content/uploads/2015/01/labtopvtrts-copy.jpg"><center><button type="button" role="button"  class="cancel btn btn-lg btn-default SwalBtn1">' + 'Close' + '</button>&nbsp;&nbsp;' +
            '<button type="button" role="button" class="confirm btn btn-lg btn-success SwalBtn2">' + 'Upgrade now' + '</button>&nbsp;&nbsp;'+
            '<button type="button" role="button" class="confirm btn btn-lg btn-warning SwalBtn3">' + "Hide Message" + '</button></center>',
        showCancelButton: false,
        showConfirmButton: false
		});
  

    }
}



});



		
//------------------------------------------------------------------------------				
function convertToNumeric(data){
	if(data instanceof Array){
		for(var index in data){
			data[index] = Number(data[index]);
		}
	} else{
		data = Number(data);
	}
	return data;
}
//------------------------------------------------------------------------------
function getRandomElementFromArray(array){
	var ranIndex = Math.floor(Math.random() * array.length);
	return array[ranIndex];
}
//------------------------------------------------------------------------------
function drawVisitsLineChart(visitsData){
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : visitsData.data.dates,
		datasets : [
			{
				label: "Visitors",
				barShowStroke: false,
				fillColor : "rgba(75,178,1970,.5)",
				strokeColor : "rgba(75,178,1970,.5)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : visitsData.data.visitors
			},
			{
				label: "Visits",
				barShowStroke: false,
				fillColor : "rgba(234,162,40,0.5)",
				strokeColor : "rgba(234,162,40,0.5)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : visitsData.data.visits
			}
		]

	}
	var ctx = document.getElementById("visitorsVisitsChart").getContext("2d");
	window.myBar = new Chart(ctx).Bar(barChartData, {
		responsive : true
	});
}
//------------------------------------------------------------------------------


function drawBrowsersBieChart(browsersData){
    var brsBieChartData = [];
    var container = jQuery('#browsersLegContainer');
    var html = '';
	
	if(browsersData.length == 0)
	{
	document.getElementById('browsersLegContainer').style.display = 'none';	
	}else{
	document.getElementById('browsersLegContainer').style.display = 'block';		
	}
	
    for(var i = 0; i < browsersData.length; i++){
        var color = getRandomElementFromArray(colors);
        var value = Number(browsersData[i].hits);
        brsBieChartData[i] = {label: browsersData[i].bsr_name, value: value, color: color};
        html += (isEmpty(value))? '' : '<div class="legend">' +
                    '<span class="color" style="background-color: ' + color + ';">&nbsp;&nbsp;</span>' +
                    '<span class="name">' + browsersData[i].bsr_name + '</span>' +
                    '<span class="value">' + value + '</span>' +
                '</div>';
    }
    html += '<div class="cleaner"></div>';
    container.html(html);
    var ctx = document.getElementById("brsBiechartContainer").getContext("2d");
    window.myPie = new Chart(ctx).Pie(brsBieChartData, {responsive : true});
}

function drawCountriesPieChart(countriesData){
    var countriesPieChartData = [];
    
    var container = jQuery('#countriesLegContainer');
    var html = '';
	
    if(countriesData.length == 0)
    {
        document.getElementById('countriesLegContainer').style.display = 'none';	
    }else{
        document.getElementById('countriesLegContainer').style.display = 'block';		
    }
	
    for(var i = 0; i < countriesData.length; i++){
        var color = getRandomElementFromArray(colors);
        var value = Number(countriesData[i].visits);
        countriesPieChartData[i] = {label: countriesData[i].ctr_name, value: value, color: color};
        html += (isEmpty(value))? '' : '<div class="legend">' +
                    '<span class="color" style="background-color: ' + color + ';">&nbsp;&nbsp;</span>' +
                    '<span class="name">' + countriesData[i].ctr_name + '</span>' +
                    '<span class="value">' + value + '</span>' +
                '</div>';
    }
    html += '<div class="cleaner"></div>';
    container.html(html);
    var ctx = document.getElementById("countriesPiechartContainer").getContext("2d");
    window.myPie = new Chart(ctx).Pie(countriesPieChartData, {responsive : true});
}

//------------------------------------------------------------------------------
function drawSrhEngVstLineChart(srhEngVisitsData){
    var srh_series = [];
    var container = jQuery('#srchEngLegContainer');
    var html = '';
	document.getElementById('srchEngLegContainer').style.display = 'none';
	
    for(var index in srhEngVisitsData.data.search_engines){
        var color = getRandomElementFromArray(colors);
        var value = countVisits(srhEngVisitsData.data.search_engines[index]);
		
		if(parseFloat(value) !=0)
		{
		document.getElementById('srchEngLegContainer').style.display = 'block';	
		}
		
        srh_series[srh_series.length] = {
                                        "label": index,
                                        "value": value,
                                        "color": color
                                        }
                                        
        html += (isEmpty(value))? '' : '<div class="legend">' +
                    '<span class="color" style="background-color: ' + color + ';">&nbsp;&nbsp;</span>' +
                    '<span class="name">' + index + '</span>' +
                    '<span class="value">' + value + '</span>' +
                '</div>';
    }
    html += '<div class="cleaner"></div>';
    container.html(html);
    var ctx = document.getElementById("srhEngBieChartContainer").getContext("2d");
    window.myPie = new Chart(ctx).Pie(srh_series, {responsive : true});
}


function isEmpty(val){
    return (val == null || val == 0 || val == '' || val == '0');
}

//------------------------------------------------------------------------------
function countVisits(arr){
	var count = 0;
	for(var i = 0; i < arr.length; i++){
		count += Number(arr[i]);
	}
	return count;
}
//------------------------------------------------------------------------------

jQuery(document).ready(function () {
	if( !jQuery('#countriesPiechartContainer').length ){
		return;
	}
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