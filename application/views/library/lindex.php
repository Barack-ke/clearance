<div class="container">
	<table class="table table-striped table-responsive-md">
			<thead>
				<tr>
				<td>StudentId</td>
				<td>student name</td>
				<td>Regno</td>
			</tr>
			</thead>
			<?php
				foreach ($libs as $lib){?> 
		<tbody>
			<tr>
				<td><?php echo $lib->studentId;?></td>
				<td><?php echo $lib->stname;?></td>
				<td><?php echo $lib->regno;?></td>
				<?php
				$lib=$this->encryption->encrypt($lib->studentId);
				$lib=strtr($lib, array('='=>'-','+'=>'.','/'=>'~'));?>
				<td><button type="button" class="btn btn-info "><a href="<?=base_url('library/clearlib/'.$lib);?>">Clear</a></button></td>
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>