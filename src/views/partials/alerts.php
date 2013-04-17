<?php if ($errors->all()): ?>
	<div id="errors" class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php foreach ($errors->all() as $message): ?>		 
			<p><?=$message?></p>		
		<?php endforeach; ?>					
	</div>
<?php endif; ?>