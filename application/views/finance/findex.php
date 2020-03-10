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
				foreach ($fans as $fan){?> 
		<tbody>
			<tr>
				<td><?php echo $fan->studentId;?></td>
				<td><?php echo $fan->stname;?></td>
				<td><?php echo $fan->regno;?></td>
				<?php
					$studentid = $this->encryption->encrypt($fan->studentId);
            $studentid = strtr($studentid, array('+' => '.', '=' => '-', '/' => '~'));

				?>
				<td><button type="button" class="btn btn-info "><a href="<?=base_url('finance/clearfinance/'. $studentid);?>">Clear</a></button></td>
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>