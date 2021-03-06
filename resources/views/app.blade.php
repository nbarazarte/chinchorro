<!doctype html>
<html lang="en-US">
	<head>
		
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Cryptia Exchange - Admin</title>
		<meta name="description" content="" />
		<meta name="Author" content="Neil Barazarte [ezebarazarte@gmail.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		{!! Html::style('smarty/assets/plugins/bootstrap/css/bootstrap.min.css') !!}
		
		<!-- THEME CSS -->
		{!! Html::style('smarty/assets/css/essentials.css') !!}
		{!! Html::style('smarty/assets/css/layout.css') !!}
		{!! Html::style('smarty/assets/css/color_scheme/green.css') !!}
		{!! Html::style('smarty/assets/css/font-awesome.min.css') !!}

		<!-- PAGE LEVEL STYLES -->
		{!! Html::style('smarty/assets/css/layout-datatables.css') !!}

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>

		<!-- WRAPPER -->
		<div id="wrapper" class="clearfix">

			@yield('content')

		</div>

		<script type="text/javascript">var plugin_path = 'smarty/assets/plugins/';</script>
		{!! Html::script('smarty/assets/plugins/jquery/jquery-2.1.4.min.js') !!}
		{!! Html::script('smarty/assets/js/app.js') !!}
		{!! Html::script('smarty/assets/js/custom.js') !!}

		<!-- PAGE LEVEL SCRIPT -->
		<script type="text/javascript">
			/* 
				Toastr Notification On Load 

				TYPE:
					primary
					info
					error
					success
					warning

				POSITION
					top-right
					top-left
					top-center
					top-full-width
					bottom-right
					bottom-left
					bottom-center
					bottom-full-width
					
				false = click link (example: "http://www.stepofweb.com")
			
			_toastr("Welcome, you have 2 new orders","top-right","success",false);

*/


			/** SALES CHART
			******************************************* **/
			loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
				loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
					loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
						loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
							loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
								loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
									loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){

										if (jQuery("#flot-sales").length > 0) {

											/* DEFAULTS FLOT COLORS */
											var $color_border_color = "#eaeaea",		/* light gray 	*/
												$color_second 		= "#6595b4";		/* blue      	*/


											var d = [
												[1196463600000, 0], [1196550000000, 0], [1196636400000, 0], [1196722800000, 77], [1196809200000, 3636], [1196895600000, 3575], [1196982000000, 2736], [1197068400000, 1086], [1197154800000, 676], [1197241200000, 1205], [1197327600000, 906], [1197414000000, 710], [1197500400000, 639], [1197586800000, 540], [1197673200000, 435], [1197759600000, 301], [1197846000000, 575], [1197932400000, 481], [1198018800000, 591], [1198105200000, 608], [1198191600000, 459], [1198278000000, 234], [1198364400000, 4568], [1198450800000, 686], [1198537200000, 4122], [1198623600000, 449], [1198710000000, 468], [1198796400000, 392], [1198882800000, 282], [1198969200000, 208], [1199055600000, 229], [1199142000000, 177], [1199228400000, 374], [1199314800000, 436], [1199401200000, 404], [1199487600000, 544], [1199574000000, 500], [1199660400000, 476], [1199746800000, 462], [1199833200000, 500], [1199919600000, 700], [1200006000000, 750], [1200092400000, 600], [1200178800000, 500], [1200265200000, 900], [1200351600000, 930], [1200438000000, 1200], [1200524400000, 980], [1200610800000, 950], [1200697200000, 900], [1200783600000, 1000], [1200870000000, 1050], [1200956400000, 1150], [1201042800000, 1100], [1201129200000, 1200], [1201215600000, 1300], [1201302000000, 1700], [1201388400000, 1450], [1201474800000, 1500], [1201561200000, 1510], [1201647600000, 1510], [1201734000000, 1510], [1201820400000, 1700], [1201906800000, 1800], [1201993200000, 1900], [1202079600000, 2000], [1202166000000, 2100], [1202252400000, 2200], [1202338800000, 2300], [1202425200000, 2400], [1202511600000, 2550], [1202598000000, 2600], [1202684400000, 2500], [1202770800000, 2700], [1202857200000, 2750], [1202943600000, 2800], [1203030000000, 3245], [1203116400000, 3345], [1203202800000, 3000], [1203289200000, 3200], [1203375600000, 3300], [1203462000000, 3400], [1203548400000, 3600], [1203634800000, 3700], [1203721200000, 3800], [1203807600000, 4000], [1203894000000, 4500]];
										
											for (var i = 0; i < d.length; ++i) {
												d[i][0] += 60 * 60 * 1000;
											}
										
											var options = {

												xaxis : {
													mode : "time",
													tickLength : 5
												},

												series : {
													lines : {
														show : true,
														lineWidth : 1,
														fill : true,
														fillColor : {
															colors : [{
																opacity : 0.1
															}, {
																opacity : 0.15
															}]
														}
													},
												   //points: { show: true },
													shadowSize : 0
												},

												selection : {
													mode : "x"
												},

												grid : {
													hoverable : true,
													clickable : true,
													tickColor : $color_border_color,
													borderWidth : 0,
													borderColor : $color_border_color,
												},

												tooltip : true,

												tooltipOpts : {
													content : "Sales: %x <span class='block'>$%y</span>",
													dateFormat : "%y-%0m-%0d",
													defaultTheme : false
												},

												colors : [$color_second],
										
											};
										
											var plot = jQuery.plot(jQuery("#flot-sales"), [d], options);
										}

									});
								});
							});
						});
					});
				});
			});
			</script>

 @if(Route::current()->getName() == 'buscarCuenta') 
		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
							"columns": [
							{
								"orderable": false
							}, 							
							{
								"orderable": true
							},
							{
								"orderable": true
							},							
							{
								"orderable": true
							}, 							 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							},
							{
								"orderable": true
							}, 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							}, 														
							{
								"orderable": true
							}
							],
							"lengthMenu": [
								[5, 15, 20, -1],
								[5, 15, 20, "Todos"] // change per page values here
							],
							// set the initial value
							"pageLength": 5,            
							"pagingType": "bootstrap_full_number",
							"language": {
								"lengthMenu": "  _MENU_ Filas",
								"paginate": {
									"previous":"Anterior",
									"next": "Siguiente",
									"last": "Fin",
									"first": "Inicio"
								}
							},
							"columnDefs": [{  // set default column settings
								'orderable': false,
								'targets': [0]
							}, {
								"searchable": false,
								"targets": [0]
							}],
							"order": [
								[1, "asc"]
							] // set first column as a default sort by asc
						});

						var tableWrapper = jQuery('#datatable_sample_wrapper');

						table.find('.group-checkable').change(function () {
							var set = jQuery(this).attr("data-set");
							var checked = jQuery(this).is(":checked");
							jQuery(set).each(function () {
								if (checked) {
									jQuery(this).attr("checked", true);
									jQuery(this).parents('tr').addClass("active");
								} else {
									jQuery(this).attr("checked", false);
									jQuery(this).parents('tr').removeClass("active");
								}
							});
							jQuery.uniform.update(set);
						});

						table.on('change', 'tbody tr .checkboxes', function () {
							jQuery(this).parents('tr').toggleClass("active");
						});

						tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

					}

				});
			});
		</script>
@endif

@if(Route::current()->getName() == 'buscarPost') 
		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
							"columns": [
							{
								"orderable": false
							}, 							
							{
								"orderable": true
							},
							{
								"orderable": true
							},						
							{
								"orderable": true
							}, 							 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							},							
							{
								"orderable": true
							}
							],
							"lengthMenu": [
								[5, 15, 20, -1],
								[5, 15, 20, "Todos"] // change per page values here
							],
							// set the initial value
							"pageLength": 5,            
							"pagingType": "bootstrap_full_number",
							"language": {
								"lengthMenu": "  _MENU_ Filas",
								"paginate": {
									"previous":"Anterior",
									"next": "Siguiente",
									"last": "Fin",
									"first": "Inicio"
								}
							},
							"columnDefs": [{  // set default column settings
								'orderable': false,
								'targets': [0]
							}, {
								"searchable": false,
								"targets": [0]
							}],
							"order": [
								[4, "asc"]
							] // set first column as a default sort by asc
						});

						var tableWrapper = jQuery('#datatable_sample_wrapper');

						table.find('.group-checkable').change(function () {
							var set = jQuery(this).attr("data-set");
							var checked = jQuery(this).is(":checked");
							jQuery(set).each(function () {
								if (checked) {
									jQuery(this).attr("checked", true);
									jQuery(this).parents('tr').addClass("active");
								} else {
									jQuery(this).attr("checked", false);
									jQuery(this).parents('tr').removeClass("active");
								}
							});
							jQuery.uniform.update(set);
						});

						table.on('change', 'tbody tr .checkboxes', function () {
							jQuery(this).parents('tr').toggleClass("active");
						});

						tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

					}

				});
			});
		</script>
@endif

@if(Route::current()->getName() == 'buscarNoticia') 
		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
							"columns": [
							{
								"orderable": false
							}, 							
							{
								"orderable": true
							},
							{
								"orderable": true
							},
							{
								"orderable": true
							}, 							 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							},							
							{
								"orderable": true
							}
							],
							"lengthMenu": [
								[5, 15, 20, -1],
								[5, 15, 20, "Todos"] // change per page values here
							],
							// set the initial value
							"pageLength": 5,            
							"pagingType": "bootstrap_full_number",
							"language": {
								"lengthMenu": "  _MENU_ Filas",
								"paginate": {
									"previous":"Anterior",
									"next": "Siguiente",
									"last": "Fin",
									"first": "Inicio"
								}
							},
							"columnDefs": [{  // set default column settings
								'orderable': false,
								'targets': [0]
							}, {
								"searchable": false,
								"targets": [0]
							}],
							"order": [
								[4, "asc"]
							] // set first column as a default sort by asc
						});

						var tableWrapper = jQuery('#datatable_sample_wrapper');

						table.find('.group-checkable').change(function () {
							var set = jQuery(this).attr("data-set");
							var checked = jQuery(this).is(":checked");
							jQuery(set).each(function () {
								if (checked) {
									jQuery(this).attr("checked", true);
									jQuery(this).parents('tr').addClass("active");
								} else {
									jQuery(this).attr("checked", false);
									jQuery(this).parents('tr').removeClass("active");
								}
							});
							jQuery.uniform.update(set);
						});

						table.on('change', 'tbody tr .checkboxes', function () {
							jQuery(this).parents('tr').toggleClass("active");
						});

						tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

					}

				});
			});
		</script>
@endif

@if(Route::current()->getName() == 'buscarTutorial') 
		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
							"columns": [
							{
								"orderable": false
							}, 							
							{
								"orderable": true
							},
						
							{
								"orderable": true
							}, 							 
							{
								"orderable": true
							}, 
							{
								"orderable": true
							},							
							{
								"orderable": true
							}
							],
							"lengthMenu": [
								[5, 15, 20, -1],
								[5, 15, 20, "Todos"] // change per page values here
							],
							// set the initial value
							"pageLength": 5,            
							"pagingType": "bootstrap_full_number",
							"language": {
								"lengthMenu": "  _MENU_ Filas",
								"paginate": {
									"previous":"Anterior",
									"next": "Siguiente",
									"last": "Fin",
									"first": "Inicio"
								}
							},
							"columnDefs": [{  // set default column settings
								'orderable': false,
								'targets': [0]
							}, {
								"searchable": false,
								"targets": [0]
							}],
							"order": [
								[4, "asc"]
							] // set first column as a default sort by asc
						});

						var tableWrapper = jQuery('#datatable_sample_wrapper');

						table.find('.group-checkable').change(function () {
							var set = jQuery(this).attr("data-set");
							var checked = jQuery(this).is(":checked");
							jQuery(set).each(function () {
								if (checked) {
									jQuery(this).attr("checked", true);
									jQuery(this).parents('tr').addClass("active");
								} else {
									jQuery(this).attr("checked", false);
									jQuery(this).parents('tr').removeClass("active");
								}
							});
							jQuery.uniform.update(set);
						});

						table.on('change', 'tbody tr .checkboxes', function () {
							jQuery(this).parents('tr').toggleClass("active");
						});

						tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

					}

				});
			});
		</script>
@endif

	</body>
</html>