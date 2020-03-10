<div class="container">
	<div class="row">
	<button class="btn btn-secondary"><a href="<?=base_url('');?>">Logout</a></button>
	<table class="table table-striped table-responsive-md">
			<thead>
				<tr>
				<td>Student RegNo</td>
				<td>Sports</td>
				<td>Library</td>
				<td>Hostel</td>
				<td>Cafe</td>
				<td>Dean</td>
				<td>Department</td>
				<td>Finance</td>
			</tr>
			</thead>
			<?php
				foreach ($clears as $clear){?> 
		<tbody>
			<tr>
				<td><?php echo $clear->regno;?></td>
				<td>
					<?php
					if($clear->sportstatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->libstatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->hostelstatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->cafestatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->deanstatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->deptstatus == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<td>
					<?php
					if($clear->financebalance == 0){
						echo '<span style="color: #ed2415">Not Cleared</span>';
					}else{
						echo '<span style="color: #81f046">Cleared</span>';
					}
					?>
				</td>
				<?php
				$clear=$this->encryption->encrypt($clear->studentId);
				$clear=strtr($clear, array('='=>'-','+'=>'.','/'=>'~'));?>
				
			</tr>
		</tbody>
		<?php
	}
?>
	</table>
</div>
</div>