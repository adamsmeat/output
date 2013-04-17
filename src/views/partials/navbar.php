<div class="navbar navbar-static-top navbar-inverse">
	<div class="navbar-inner">
			
		<a class="btn btn-navbar" data-toggle="collapse" data-target="#navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<a href="<?=Request::root()?>" class="brand">BarangayPH</a>       
        <div id="navbar-collapse" class="nav-collapse  collapse">
			
			<ul class="nav">
				<li><a href="<?=URL::to('about')?>"><i class="icon-info-sign"></i> About</a></li>
			</ul>
			<ul class="nav pull-right">
				<li class="dropdown" >
				<?php if (Auth::guest()): ?>				
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-signin"></i> Sign In <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?=URL::route('registration')?>">Register</a></li>
						<li><a href="<?=URL::route('login')?>">Login</a></li>

						<li role="presentation" class="divider"></li>
						<li class="nav-header">Social Signon</li>
						<li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
						<li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
						<li><a href="#"><i class="icon-github"></i> Github</a></li>					
					</ul>
				<?php else: ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">[ <i class="icon-user"></i> <?=Auth::user()->username?> ] <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?=URL::route('dashboard')?>"><i class="icon-wrench"></i> Profile</a></li>
						<li><a href="<?=URL::route('logout')?>"><i class="icon-signout"></i> Logout</a></li>
					</ul>
				<?php endif; ?>								
				</li>		
			</ul>        	
        </div>	


	</div>
</div>

<script>
(function($){
  "use strict";
  // Define your library strictly...
  $('.dropdown-toggle').dropdown();
})(jQuery);
</script>

