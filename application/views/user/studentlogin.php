<div class="container">
	<?=form_open('student/getin');?>
	<div class="form-group row">
		<label for="regno" class="col-sm-2 col-form-label col-form-label-sm">RegNo</label>
		<div class="col-sm-5">
			<input type="text" class="form-control form-control-sm" name="regno"placeholder="regno...">
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
			<input type="submit" class="btn btn-primary" value="login">
		</div>
	</div>
</form>
</div>