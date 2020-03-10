<div class="container">
	
	<table class="table table-striped table-responsive-sm">
		<thead>
		<tr>
			<th width="20%">StudentId</th>
			<th width="20%">Student name</th>
			<th width="20%">Regno</th>
			
		</tr>
	</thead>
	<?php foreach ($cafes as $cafe){?>
	<tbody>
		<tr>
			<td><?php echo $cafe->studentId;?></td>
			<td><?php echo $cafe->stname;?></td>
			<td><?php echo $cafe->regno;?></td>
			<?php
			$cafe=$this->encryption->encrypt($cafe->studentId);
			$cafe= strtr($cafe, array('+'=>'.','/'=>'~','='=>'-'));?>
			 <td><button type="button" class="btn btn-info "><a href="<?= base_url('cafe/clearcafe/'.$cafe); ?>">Clear</a></button></td>
		</tr>
	</tbody>
	<?php
	} ?> 
	</table>
	
</div>