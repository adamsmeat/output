<ul class="nav nav-tabs" id="dashboardTab">
  <li><a href="#overview">Overview</a></li>
  <li><a href="#profile">Profile</a></li>
  <li><a href="#messages">Messages</a></li>
  <li><a href="#settings">Settings</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="overview">
		<?=View::make('pages.dashboard.overview')?>
	</div>
	<div class="tab-pane" id="profile">
		<?=View::make('pages.dashboard.profile')?>
	</div>
	<div class="tab-pane" id="messages">...</div>
	<div class="tab-pane" id="settings">...</div>
</div>

<script>
(function($){
	"use strict";
	// Define your library strictly...
	$('#dashboardTab  a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	$('#dashboardTab a:first').tab('show'); // Select first tab 
})(jQuery);
</script>


