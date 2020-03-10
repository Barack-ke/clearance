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
				foreach ($deans as $dean){?> 
		<tbody>
			<tr>
				<td><?php echo $dean->studentId;?></td>
				<td><?php echo $dean->stname;?></td>
				<td><?php echo $dean->regno;?></td>
				<?php
				$dean= $this->encryption->encrypt($dean->studentId);
				$dean=str($dean,array('='=>'-','/'=>'~','+'=>'.'));?>
				<td><button type="button" class="btn btn-info "><a href="<?=base_url('dean/cleardean/'.$dean);?>">Clear</a></button></td>
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>