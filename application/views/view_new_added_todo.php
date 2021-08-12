<div id="new-todo">
	<h3>NEWLY ADDED <span id="blu-color">TODOs</span></h3>
	<table id="todos">
			<tr id="table-header" align="center">	
				<td>TODOS</td>
				<td>START TIME</td>
				<td>DURATION</td>
				<td></td>
			</tr>
	<?php foreach ($query->result() as $row): ?>
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