<?=Form::open(['url' => 'login', 'class' => 'form-horizontal'])?>
	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<?=Form::text('email', null, ['placeholder' => 'email@example.com'])?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<?=Form::password('password')?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?=Form::submit('Login', ['class' => 'btn btn-primary'])?>
		</div>
	</div>
<?=Form::close()?>
