<?php?>

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
				<li id="inp-dr"><input type="text" name="endtime" id="dur"></li>
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
			<input id="" type="submit" name="submit" value="ADD">

			<div class="clearfix"></div>
		  	
		  	<div id="load-newtodo">

			</div>	
		
</div>

<div id="upcom-todo-content" class="content-container-2">
	<table id="todos">
			<tr id="table-header" align="center">	
				<td>TODOS</td>
				<td>START TIME</td>
				<td>DURATION</td>
				<td></td>
			</tr>
	<?php foreach ($upcom->result() as $row): ?>
			<tr align="center">
				<td><?php echo $row->Title;?></td>
				<td><?php echo $row->Start;?></td>
				<td><?php echo $row->Duration." ".$row->Unit_Time;?></td>
				<td><a href="#" id="s1" class="show" onclick="showDetails()">Details</a></td>
			<div class="show-detail">
				<p>This slide uses "modal" option set to "true". When using a modal pageslide, clicking on the main window will not close the window. You must explicitly call <code>$.pageslide.close()</code>.</p>
			</div>
			</tr>
			<?php endforeach; ?>
	</table>
</div>

<div id="ongo-todo-content" class="content-container-2">
			<p>Ongoing todo's</p>
</div>

<div id="pend-todo-content" class="content-container-2">
			<p>Pending todo's</p>
</div>

<div id="cancl-todo-content" class="content-container-2">
			<p>cancelled todo's</p>
</div>

<div id="fin-todo-content" class="content-container-2">
			<p>finished todo's</p>
</div>