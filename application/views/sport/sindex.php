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
				foreach ($sports as $sport){?> 
		<tbody>
			<tr>
				<td><?php echo $sport->studentId;?></td>
				<td><?php echo $sport->stname;?></td>
				<td><?php echo $sport->regno;?></td>
				<?php
				$sport=$this->encryption->encrypt($sport->studentId);
				$sport=strtr($sport, array('='=>'-','+'=>'.','/'=>'~'));?>
				<td><button type="button" class="btn btn-info "><a href="<?=base_url('sport/clearsport/'.$sport);?>">Clear</a></button></td>
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>