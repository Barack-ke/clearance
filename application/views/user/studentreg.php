<div class="container">
	<?=form_open('student/saveuser');?>
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Student name</label>
		<div class="col-sm-5">
			<input type="text" class="form-control form-control-sm" name="name"placeholder="student name...">
		</div>
	</div>
	<div class="form-group row">
		<label for="regno" class="col-sm-2 col-form-label col-form-label-sm">Regno</label>
		<div class="col-sm-5">
			<input type="text" class="form-control form-control-sm" name="regno"placeholder=" regno...">
		</div>
	</div>
	<div class="form-group row">
		<label for="course" class="col-sm-2 col-form-label col-form-label-sm">Student course</label>
		<div class="col-sm-5">
			<select name="course" class="form-control form-control-sm">
						<?php
						foreach ($courses as $course) {
							echo '<option value="'.$course['id'].'">'.$course['name'].'</option>';
						}
						?>
					</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
		<div class="col-sm-5">
			<input type="password" class="form-control form-control-sm" name="password"placeholder=" password...">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-5">
			<input type="submit" class="btn btn-primary" value="create">
		</div>
	</div>
</form>
</div>