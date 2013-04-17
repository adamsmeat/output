<h2>Hello <?=Auth::user()->first_name?>!</h2>
<ul>
	<li>Previous Login: <?=Session::get('last_login')?></li>
	<li>Previous IP Address: <?=Session::get('last_ip')?></li>
	<li>Current session started: <?=Session::get('login_timestamp')?></li>
</ul>