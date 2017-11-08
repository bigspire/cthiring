/* [ ---- Gebo Admin Panel - dashboard ---- ] */

	$(document).ready(function() {
		//* small charts
		// gebo_peity.init();
		//* charts
		// gebo_charts.fl_1();
		// gebo_charts.fl_2();
		//* sortable/searchable list
		gebo_flist.init();
		gebo_flist2.init();
		gebo_flist3.init();
		gebo_flist4.init();
		//* calendar
		//gebo_calendar.init();
		//* responsive table
		gebo_media_table.init();
		//* resize elements on window resize
		var lastWindowHeight = $(window).height();
		var lastWindowWidth = $(window).width();
		$(window).on("debouncedresize",function() {
			if($(window).height()!=lastWindowHeight || $(window).width()!=lastWindowWidth){
				lastWindowHeight = $(window).height();
				lastWindowWidth = $(window).width();
				//* rebuild calendar
				//$('#calendar').fullCalendar('render');
			}
		});
		//* small gallery grid
        gebo_gal_grid.small();
	});
	
	//* small charts
	gebo_peity = {
		init: function() {
			$.fn.peity.defaults.line = {
				strokeWidth: 1,
				delimeter: ",",
				height: 32,
				max: null,
				min: 0,
				width: 50
			};
			$.fn.peity.defaults.bar = {
				delimeter: ",",
				height: 32,
				max: null,
				min: 0,
				width: 50
			};
			$(".p_bar_up").peity("bar",{
				colour: "#6cc334"
			});
			$(".p_bar_down").peity("bar",{
				colour: "#e11b28"
			});
			$(".p_line_up").peity("line",{
				colour: "#b4dbeb",
				strokeColour: "#3ca0ca"
			});
			$(".p_line_down").peity("line",{
				colour: "#f7bfc3",
				strokeColour: "#e11b28"
			});
		}
	};

	//* charts
    gebo_charts = {
        fl_1: function() {
            // Setup the placeholder reference
            elem = $('#fl_1');
            var sin = [], cos = [];
            for (var i = 0; i < 14; i += 0.5) {
                sin.push([i, Math.sin(i)]);
                cos.push([i, Math.cos(i)]);
            }
            // Setup the flot chart using our data
            $.plot(elem, 
                [
                    { label: "sin(x)",  data: sin},
                    { label: "cos(x)",  data: cos}
                ], 
                {
                    lines: { show: true },
                    points: { show: true },
                    yaxis: { min: -1.2, max: 1.2 },
                    grid: {
                        hoverable: true,
                        borderWidth: 1
                    },
					colors: [ "#8cc7e0", "#2d83a6" ]
                }
            );
            // Create a tooltip on our chart
            elem.qtip({
                prerender: true,
                content: 'Loading...', // Use a loading message primarily
                position: {
                    viewport: $(window), // Keep it visible within the window if possible
                    target: 'mouse', // Position it in relation to the mouse
                    adjust: { x: 8, y: -30 } // ...but adjust it a bit so it doesn't overlap it.
                },
                show: false, // We'll show it programatically, so no show event is needed
                style: {
                    classes: 'ui-tooltip-shadow ui-tooltip-tipsy',
                    tip: false // Remove the default tip.
                }
            });
         
            // Bind the plot hover
            elem.on('plothover', function(event, coords, item) {
                // Grab the API reference
                var self = $(this),
                    api = $(this).qtip(),
                    previousPoint, content,
         
                // Setup a visually pleasing rounding function
                round = function(x) { return Math.round(x * 1000) / 1000; };
         
                // If we weren't passed the item object, hide the tooltip and remove cached point data
                if(!item) {
                    api.cache.point = false;
                    return api.hide(event);
                }
         
                // Proceed only if the data point has changed
                previousPoint = api.cache.point;
                if(previousPoint !== item.dataIndex)
                {
                    // Update the cached point data
                    api.cache.point = item.dataIndex;
         
                    // Setup new content
                    content = item.series.label + '(' + round(item.datapoint[0]) + ') = ' + round(item.datapoint[1]);
         
                    // Update the tooltip content
                    api.set('content.text', content);
         
                    // Make sure we don't get problems with animations
                    //api.elements.tooltip.stop(1, 1);
         
                    // Show the tooltip, passing the coordinates
                    api.show(coords);
                }
            });
        },
        fl_2 : function() {
            // Setup the placeholder reference
            elem = $('#fl_2');
           
			var data = [
				{
					label: "United States",
					data: 560
				},
				{
					label: "Brazil",
					data: 360
				},
                {
					label: "France",
					data: 320
				},
				{
					label: "Turkey",
					data: 280
				},
				{
					label: "India",
					data: 160
				}
			];
			
			// Setup the flot chart using our data
            $.plot(elem, data,         
                {
					label: "Visitors by Location",
                    series: {
                        pie: {
                            show: true,
							highlight: {
								opacity: 0.2
							}
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
					//colors: [ "#b3d3e8", "#8cbddd", "#65a6d1", "#3e8fc5", "#3073a0", "#245779", "#183b52" ]
					colors: [ "#b4dbeb", "#8cc7e0", "#64b4d5", "#3ca0ca", "#2d83a6", "#22637e", "#174356", "#0c242e" ]
                }
            );
            // Create a tooltip on our chart
            elem.qtip({
                prerender: true,
                content: 'Loading...', // Use a loading message primarily
                position: {
                    viewport: $(window), // Keep it visible within the window if possible
                    target: 'mouse', // Position it in relation to the mouse
                    adjust: { x: 7 } // ...but adjust it a bit so it doesn't overlap it.
                },
                show: false, // We'll show it programatically, so no show event is needed
                style: {
                    classes: 'ui-tooltip-shadow ui-tooltip-tipsy',
                    tip: false // Remove the default tip.
                }
            });
         
            // Bind the plot hover
            elem.on('plothover', function(event, pos, obj) {
                
                // Grab the API reference
                var self = $(this),
                    api = $(this).qtip(),
                    previousPoint, content,
         
                // Setup a visually pleasing rounding function
                round = function(x) { return Math.round(x * 1000) / 1000; };
         
                // If we weren't passed the item object, hide the tooltip and remove cached point data
                if(!obj) {
                    api.cache.point = false;
                    return api.hide(event);
                }
         
                // Proceed only if the data point has changed
                previousPoint = api.cache.point;
                if(previousPoint !== obj.seriesIndex)
                {
                    percent = parseFloat(obj.series.percent).toFixed(2);
                    // Update the cached point data
                    api.cache.point = obj.seriesIndex;
                    // Setup new content
                    content = obj.series.label + ' ( ' + percent + '% )';
                    // Update the tooltip content
                    api.set('content.text', content);
                    // Make sure we don't get problems with animations
                    //api.elements.tooltip.stop(1, 1);
                    // Show the tooltip, passing the coordinates
                    api.show(pos);
                }
            });
        }
    };
	
		gebo_flist3 = {
		init: function(){
			//*typeahead
			var list_source = [];
			$('.user_list3 li').each(function(){
				var search_name = $(this).find('.sl_name3').text();
				list_source.push(search_name);
				var search_date = $(this).find('.sl_date3').text();
				list_source.push(search_date);
			});
			$('.user-list3-search').typeahead({source: list_source, items:5});
			
			var pagingOptions = {};
			var options = {
				valueNames: [ 'sl_name3', 'sl_status3', 'sl_date3' ],
				page: 5,
				plugins: [
					[ 'paging', {
						pagingClass	: "bottomPaging",
						innerWindow	: 1,
						left		: 1,
						right		: 1
					} ]
				]
			};
			var userList = new List('user-list3', options);
			

			$('#filter-21').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status3 == "Offer Pending") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-22').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status3 == "Offer Accepted") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-23').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status3 == "Rejected") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			
	
			$('#filter-none3').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter();
				return false;
			});
			
			$('#user-list3').on('click','.sort',function(){
					$('.sort').parent('li').removeClass('active');
					if($(this).parent('li').hasClass('active')) {
						$(this).parent('li').removeClass('active');
					} else {
						$(this).parent('li').addClass('active');
					}
				}
			);
		}
	};
	
		gebo_flist4 = {
		init: function(){
			//*typeahead
			var list_source = [];
			$('.user_list4 li').each(function(){
				var search_name = $(this).find('.sl_name4').text();
				list_source.push(search_name);
				var search_date = $(this).find('.sl_date4').text();
				list_source.push(search_date);
			});
			$('.user-list4-search').typeahead({source: list_source, items:5});
			
			var pagingOptions = {};
			var options = {
				valueNames: [ 'sl_name4', 'sl_status4', 'sl_date4' ],
				page: 5,
				plugins: [
					[ 'paging', {
						pagingClass	: "bottomPaging",
						innerWindow	: 1,
						left		: 1,
						right		: 1
					} ]
				]
			};
			var userList = new List('user-list4', options);
			
			$('#filter-31').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status4 == "Joined") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-32').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status4 == "Not Joined") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-33').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status4 == "Deferred") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-none4').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter();
				return false;
			});
			
			$('#user-list4').on('click','.sort',function(){
					$('.sort').parent('li').removeClass('active');
					if($(this).parent('li').hasClass('active')) {
						$(this).parent('li').removeClass('active');
					} else {
						$(this).parent('li').addClass('active');
					}
				}
			);
		}
	};
	
	gebo_flist2 = {
		init: function(){
			//*typeahead
			var list_source = [];
			$('.user_list2 li').each(function(){
				var search_name = $(this).find('.sl_name2').text();
				list_source.push(search_name);
				var search_date = $(this).find('.sl_date2').text();
				list_source.push(search_date);
			});
			$('.user-list2-search').typeahead({source: list_source, items:5});
			
			var pagingOptions = {};
			var options = {
				valueNames: [ 'sl_name2','sl_date2','sl_status2'],
				page: 5,
				plugins: [
					[ 'paging', {
						pagingClass	: "bottomPaging",
						innerWindow	: 1,
						left		: 1,
						right		: 1
					} ]
				]
			};
			var userList = new List('user-list2', options);
			
			$('#filter-1').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "AH Pending") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
													
			$('#filter-2').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "AH Rejected") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-3').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "AH Validated") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-4').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "CV Sent") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-5').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "CV Shortlisted") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-6').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "CV Rejected") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-7').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status2 == "CV On Hold") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-none2').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter();
				return false;
			});
			
			$('#user-list2').on('click','.sort',function(){
					$('.sort').parent('li').removeClass('active');
					if($(this).parent('li').hasClass('active')) {
						$(this).parent('li').removeClass('active');
					} else {
						$(this).parent('li').addClass('active');
					}
				}
			);
		}
	};

	//* filterable list
	gebo_flist = {
		init: function(){
			//*typeahead
			var list_source = [];
			$('.user_list li').each(function(){
				var search_name = $(this).find('.sl_name').text();
				list_source.push(search_name);
				var search_name = $(this).find('.sl_date').text();
				list_source.push(search_name);
			});
			$('.user-list-search').typeahead({source: list_source, items:5});
			
			var pagingOptions = {};
			var options = {
				valueNames: [ 'sl_name', 'sl_status', 'sl_date' ],
				page: 5,
				plugins: [
					[ 'paging', {
						pagingClass	: "bottomPaging",
						innerWindow	: 1,
						left		: 1,
						right		: 1
					} ]
				]
			};
			var userList = new List('user-list', options);
			
			$('#filter-11').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status == "Interview Scheduled") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-12').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status == "Interview Selected") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-13').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status == "Interview Rejected") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			$('#filter-14').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter(function(item) {
					if (item.values().sl_status == "Interview Re-Scheduled") {
						return true;
					} else {
						return false;
					}
				});
				return false;
			});
			
			$('#filter-none').on('click',function() {
				$('ul.filter li').removeClass('active');
				$(this).parent('li').addClass('active');
				userList.filter();
				return false;
			});
			
			$('#user-list').on('click','.sort',function(){
					$('.sort').parent('li').removeClass('active');
					if($(this).parent('li').hasClass('active')) {
						$(this).parent('li').removeClass('active');
					} else {
						$(this).parent('li').addClass('active');
					}
				}
			);
		}
	};
	
	//* gallery grid
    gebo_gal_grid = {
        small: function() {
            //* small gallery grid
            $('#small_grid ul').imagesLoaded(function() {
                // Prepare layout options.
                var options = {
                  autoResize: true, // This will auto-update the layout when the browser window is resized.
                  container: $('#small_grid'), // Optional, used for some extra CSS styling
                  offset: 6, // Optional, the distance between grid items
                  itemWidth: 120, // Optional, the width of a grid item (li)
                  flexibleItemWidth: true
                };
                
                // Get a reference to your grid items.
                var handler = $('#small_grid ul li');
                
                // Call the layout function.
                handler.wookmark(options);
                
                $('#small_grid ul li > a').attr('rel', 'gallery').colorbox({
                    maxWidth	: '80%',
                    maxHeight	: '80%',
                    opacity		: '0.2', 
                    loop		: false,
                    fixed		: true
                });
            });
        }
    };
	
	//* calendar
	gebo_calendar = {
		init: function() {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			var calendar = $('#calendar').fullCalendar({
				header: {
					left: 'prev,next',
					center: 'title,today',
					right: 'month,agendaWeek,agendaDay'
				},
				buttonText: {
					prev: '<i class="icon-chevron-left cal_prev" />',
					next: '<i class="icon-chevron-right cal_next" />'
				},
				aspectRatio: 1.5,
				selectable: true,
				selectHelper: true,
				select: function(start, end, allDay) {
					var title = prompt('Event Title:');
					if (title) {
						calendar.fullCalendar('renderEvent',
							{
								title: title,
								start: start,
								end: end,
								allDay: allDay
							},
							true // make the event "stick"
						);
					}
					calendar.fullCalendar('unselect');
				},
				editable: true,
				theme: false,
				events: [
					{
						title: 'All Day Event',
						start: new Date(y, m, 1),
                        color: '#aedb97',
                        textColor: '#3d641b'
					},
					{
						title: 'Long Event',
						start: new Date(y, m, d-5),
						end: new Date(y, m, d-2)
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d+8, 16, 0),
						allDay: false
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d+15, 16, 0),
						allDay: false
					},
					{
						title: 'Meeting',
						start: new Date(y, m, d+12, 15, 0),
						allDay: false,
                        color: '#aedb97',
                        textColor: '#3d641b'
					},
					{
						title: 'Lunch',
						start: new Date(y, m, d, 12, 0),
						end: new Date(y, m, d, 14, 0),
						allDay: false
					},
					{
						title: 'Birthday Party',
						start: new Date(y, m, d+1, 19, 0),
						end: new Date(y, m, d+1, 22, 30),
						allDay: false,
                        color: '#cea97e',
                        textColor: '#5e4223'
					},
					{
						title: 'Click for Google',
						start: new Date(y, m, 28),
						end: new Date(y, m, 29),
						url: 'http://google.com/'
					}
				],
				eventColor: '#bcdeee'
			})
		}
	};
	
    //* responsive tables
    gebo_media_table = {
        init: function() {
			$('.mediaTable').mediaTable();
        }
    };
