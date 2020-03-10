<div class="container">
<?=form_open('course/savecourse');?>
	<div class="form-group row">
		<label for="course" class="col-sm-2 col-form-label col-form-label-sm">Course</label>
		<div class="col-sm-5">
			<input type="text" class="form-control form-control-sm" name="course"placeholder="course...">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-5">
			<input type="submit" class="btn btn-primary" value="save">
		</div>
	</div>
</form>
</div>