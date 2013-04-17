<div ng-controller="LoginCtrl">
	<h2> <span ng-bind="user.firstName"></span> <span ng-bind="user.lastName"></span></h2>
	<form id="login-form">
		<label>First Name:</label><input type="text" ng-model="user.firstName" placeholder="First Name">
		<label>Last Name:</label><input type="text" ng-model="user.lastName" placeholder="Last Name">			
		<hr>
		<button ng-click="clickedLoginButton()">Click Me</button>
	</form>				
</div>