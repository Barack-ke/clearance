<div class="container">
	<div>
		<h2>Department</h2>
	</div>
	<table class="table table-striped table-responsive-md">
			<thead>
				<tr>
				<td>StudentId</td>
				<td>student name</td>
				<td>Regno</td>
			</tr>
			</thead>
			<?php
				foreach ($depts as $dept){?> 
		<tbody>
			<tr>
				<td><?php echo $dept->studentId;?></td>
				<td><?php echo $dept->stname;?></td>
				<td><?php echo $dept->regno;?></td>
				<?php
				$dept=$this->encryption->encrypt($dept->studentId);
				$dept=strtr($dept,array('+'=>'.','/'=>'~','='=>'-'));?>
				<td><button type="button" class="btn btn-info "><a href="<?=base_url('dept/cleardept/'.$dept);?>">Clear</a></button></td>
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>