<?php
	
	$date = array();
	$todoNumber = array();
	$counter = 0;
	$events_toshow = array();

	foreach ($dates->result() as $row):
		
		$date[$counter] = $row->Date;
		$todoNumber[$counter] = $this->todo_model->count_event($row->Date);

		$counter++;

	endforeach;

			//storing events info inside array to show in calendar
			for($i=0; $i<$counter; $i++)
			{		
				
				$events_toshow[$i] = array('start'=>$date[$i],'title'=>$todoNumber[$i].' TODO(s)');

			}

?>
<!--left dashboard page load-->


	<script language="JavaScript" type="text/javascript">

	/****************** PAGE LOAD-NO REFRESH ************************/

		/***************** todo DETAILS ********************/	
		function showDetails()
		{
       			//alert($(this).attr("id"));
       			if ($(".show-detail").is(":hidden")) {
           		$('.show-detail').slideDown('fast');
           		//return false;
           		}

           		else {
					$(".show-detail").hide('fast');
				}
      	}



		$(document).ready(function(){

			$('#x-button').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #add-todo-content',function(){$('#load-page-2').fadeIn(1000);

					document.getElementById('add-nav').className = 'nav4-items-selected';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items'; 

				});
				
			});

			$('#add-nav').click(function(){
				
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #add-todo-content',function(){$('#load-page-2').fadeIn(1000);

					document.getElementById('date').value = date_holder;

					document.getElementById('add-nav').className = 'nav4-items-selected';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items';

				});


			});

			$('#upcom-nav').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #upcom-todo-content',function(){$('#load-page-2').fadeIn(1000);});

					document.getElementById('add-nav').className = 'nav4-items';
					document.getElementById('upcom-nav').className = 'nav4-items-selected'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items'; 

			});

			$('#ongo-nav').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #ongo-todo-content',function(){$('#load-page-2').fadeIn(1000);});

					document.getElementById('add-nav').className = 'nav4-items';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items-selected';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items'; 

			});

			$('#pend-nav').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #pend-todo-content',function(){$('#load-page-2').fadeIn(1000);});

					document.getElementById('add-nav').className = 'nav4-items';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items-selected'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items'; 

			});

			$('#cancl-nav').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #cancl-todo-content',function(){$('#load-page-2').fadeIn(1000);});

					document.getElementById('add-nav').className = 'nav4-items';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items-selected'; 
					document.getElementById('fin-nav').className = 'nav4-items'; 

			});

			$('#fin-nav').click(function(){
				$('#load-page-2').load('<?php echo base_url();?>index.php/todo/view_todo_subpages/'+date_holder+' #fin-todo-content',function(){$('#load-page-2').fadeIn(1000);});

					document.getElementById('add-nav').className = 'nav4-items';
					document.getElementById('upcom-nav').className = 'nav4-items'; 
					document.getElementById('ongo-nav').className = 'nav4-items';              
					document.getElementById('pend-nav').className = 'nav4-items'; 
					document.getElementById('cancl-nav').className = 'nav4-items'; 
					document.getElementById('fin-nav').className = 'nav4-items-selected'; 

			});

		});

		
	/****************** FULLCALENDAR *****************************/

		var date_holder = "";
		var events_array = <?php echo json_encode($events_toshow); ?>;
		
		$(document).ready(function() {

			var date = new Date();
			var dateToday = "";

			$('#calendar').fullCalendar({
				
			    	events:events_array,
			    	eventColor: '#c790b9',

				header: {
						left: 'prev',
						center: 'title',
						right: 'next'
					},

				eventClick: function(calEvent, jsEvent, view) {

					var stDate = $.fullCalendar.formatDate(calEvent.start, 'yyyy-M-d');
					openbox('', 1);
					document.getElementById('date').value = stDate;
					//alert(test);
				},

		    	dayClick: function(date, allDay, jsEvent, view) {
		        if (allDay) {

					openbox('', 1);
					dateToday = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+ date.getDate();
					document.getElementById('date').value =dateToday;
		            date_holder = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+ date.getDate();

		        }else{
		            alert('Clicked on the slot: ' + date);
		        }

		    	}
			});
					
		});

	
	/***************** ATTACHMENTS SLIDE DOWN ********************/

		function showUpload()
		{
			if ($('#attach-div').is(":hidden")) {
           		$('#attach-div').slideDown('fast');
           		//return false;
           		}

           		else {
					$('#attach-div').hide();
				}
		}

		function reloadCalendar()
		{
			window.location = "http://localhost/Xecute/index.php/todo/xecute";
		}

	/***************** ADD TODO/NO RELOAD ********************/

		//show newly added todos after submit
       function newlyadded() {
       	//alert("added Successfully");
	    	$("#load-newtodo").fadeOut("fast").load("<?php echo base_url();?>index.php/todo/show_newtodo/"+date_holder+" #new-todo").fadeIn("fast");
	    	 }

		$("form").on('submit',function(evt){
				
				 $.post("<?php echo base_url();?>index.php/todo/add_todo",$(this).serialize(),function(data,status){
				  
				      if(status=="success")
					      	
					     $('input[name=title]').val("");
					     $('input[name=endtime]').val("");
					     $('textarea[name=message]').val("");
				     
				      newlyadded();
				    });
				evt.preventDefault();

		});
	</script>

<div id="wrapper">

	<p id="dash-header"><span id="x">X</span><span id="xecute">ecute</span> Dashboard</p>
	
	<section id="dashboard">
		<nav id="nav-2">
			<ul id="menu-2">
				<li id="home-nav" class="nav-items"><span id="nav1-title">HOME</span></li>
				<li id="todo-nav" class="nav-items-selected"><span id="nav2-title">TO-DO's</span></li>
				<li id="gal-nav" class="nav-items"><span id="nav3-title">GALLERY</span></li>
				<li id="arch-nav" class="nav-items"><span id="nav4-title">ARCHIVES</span></li>
				<li id="set-nav" class="nav-items"><span id="nav5-title">SETTINGS</span></li>
			</ul>
		</nav>
	</section>

	<div id="container">

	<section id="load-page">
		<div id="todo-content" class="content-container">
	<div id="shadowing"></div>

	<div id="box">
	  <span id="boxtitle"></span>
		
		<div id="header">
			<input type="button" name="cancel" value="x" id="x-button" onClick="closebox(); reloadCalendar();">
			<p>TO-DO <span id="vio-color">MANAGER</span></p>
		</div>
		
		<div class="clearfix"></div>
		
		<div id="left-dboard">
			<nav id="nav-4">
				<ul id="menu-4">
					<li id="add-nav" class="nav4-items-selected"><span id="nav4-1-title">ADD TO-DOs</span></li>
					<li id="upcom-nav" class="nav4-items"><span id="nav4-2-title">UPCOMING TO-DOs</span></li>
					<li id="ongo-nav" class="nav4-items"><span id="nav4-3-title">ONGOING TO-DOs</span></li>
					<li id="pend-nav" class="nav4-items"><span id="nav4-4-title">PENDING TO-DOs</span></li>
					<li id="cancl-nav" class="nav4-items"><span id="nav4-5-title">CANCELLED TO-DOs</span></li>
					<li id="fin-nav" class="nav4-items"><span id="nav4-5-title">FINISHED TO-DOS</span></li>
				</ul>
			</nav>
		</div>
		<form id="form_addtodo" name="todoForm" action="#" method="post">	
		<section id="load-page-2">
			<div id="add-todo-content" class="content-container-2">
			
			<ul id="input-1">
				<li id="lbl-1">TITLE</li>
				<li id="inp-title"><input type ="text" id="title" name="title" required/></li>
				<li id="lbl-1">&nbsp;&nbsp;&nbsp;DATE</li>
				<li id="inp-date"><input type="text" name="date" id="date" readonly="readonly"></li>
			</ul>

			<div class="clearfix"></div>

			<ul id="input-2">
				<li id="lbl-2">START TIME</li>
				<li id="inp-hr"><select name="start" id="hour">
					<option>1:00</option>
					<option>2:00</option>
					<option>4:00</option>
					<option>6:00</option>
					<option>8:00</option>
					<option>10:00</option>
					<option>12:00</option>
					</select></li>
				<li id="lbl-2">DURATION</li>	
				<li id="inp-dr"><input type="number" name="endtime" id="dur" required/></li>
				<li id="inp-unt"><select name="unit" id="unit">
					<option>min</option>
					<option>hour</option>
					<option>day</option>
					</select></li>
				<li id="lbl-2">ALARM</li>	
				<li id="inp-alm"><select name="alarm" id="alarm">
					<option>5 min</option>
					<option>10 min</option>
					<option>15 min</option>
					<option>20 min</option>
					<option>25 min</option>
					<option>30 min</option>
					</select></li>
			</ul>
			<div class="clearfix"></div>
			<a href="#" id="attach-lnk" onclick="showUpload()"><img src="/Xecute/include/images/attach_icon.png">attachment</a>
			<div id="attach-div">
				<input type="file" name="attach">
			</div>
			<div class="clearfix"></div>
			<p>MESSAGE</p>
			<textarea name="message"></textarea>
			<input id="add-todo" type="submit" name="submit" value="ADD">
		  </form>

		  	<div class="clearfix"></div>

		  	<div id="load-newtodo">

			</div>	
			
			</div>	
		</section>

	</div>
	<div id='calendar'></div>
</div>
	</section>

	<section>
	<div id="right-sidebar">
		
		<div id="search-user">
			<form id="search">
				<p>Search Users</p>
				<ul>
					<li><input type="search"></li>
					<li id="search-button"><button></button></li>
				</ul>
			</form>
		</div>

		<div id="follow-likes">
			<section id="followers">
				<ul>
					<li id="flwrs-sym"></li>
					<li><p>FOLLOWERS</p></li>
					<li id="flwrs-count"><a href="">20000000</a></li>
				</ul>
			</section>
			<section id="following">
				<ul>
					<li id="flwng-sym"></li>
					<li><p>FOLLOWING</p></li>
					<li id="flwng-count"><a href="">1005887</a></li>
				</ul>
			</section>
			<section id="likes">
				<ul>
					<li id="likes-sym"></li>
					<li><p>LIKES</p></li>
					<li id="likes-count"><a href="">309867</a></li>
				</ul>
			</section>
		</div>

	</div>
	</section>

	</div>
	
</div>