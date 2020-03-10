<div class="container">
	
	<table class="table table-striped table-responsive-md">
		<thead>
		<tr>
			<th>studentId</th>
			<th>Student name</th>
			<th>RegNo</th>
		</tr>
	</thead>
	<?php foreach ($hostels as $hostel){?>
	<tbody>
		<tr>
			<td><?php echo $hostel->studentId;?></td>
			<td><?php echo $hostel->stname;?></td>
			<td><?php echo $hostel->regno;?></td>
			<?php
			$host=$this->encryption->encrypt($hostel->studentId);
			$host=strtr($host, array('+'=>'.','/'=>'~','='=>'-'));?>
			 <td><button type="button" class="btn btn-info "><a href="<?=base_url('hostel/clearhostel/'.$host);?>">Clear</a></button></td>
		</tr>
	</tbody>
	<?php
	} ?> 
	</table>
	
</div>