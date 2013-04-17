<div ng-controller="LoginCtrl">
	<h1>{{user.firstName}} {{user.lastName}}</h1>
	<hr>			
	<form id="login-form">
		<label>First Name:</label><input type="text" ng-model="user.firstName" placeholder="First Name">
		<label>Last Name:</label><input type="text" ng-model="user.lastName" placeholder="Last Name">			
		<hr>
		<button ng-click="clickedLoginButton()">Click Me</button>
	</form>				
</div>