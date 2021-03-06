<!doctype>
<html>
	<head>
	<title>HomeIsWhereTheMoneyIs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://108.255.70.130/css/scc.css">
	</head>
	<body>
		<div>
			<a href="/"><h1 class="logomaxipad">Home</h1></a>
		</div>
		<div class="jumbotron text-center maincontentarea">
			<h1 class="sectiontitle">Registration Page</h1><br>
			{{ Form::open(array('action' => 'HomeController@registerUser', 'method' => 'post')) }}
			<p>
				{{ Form::label('firstnamelabel', 'first name') }}
				<br>
				{{ Form::text('firstname', '') }}	
			</p>
			<p>
				{{ Form::label('lastnamelabel', 'last name') }}
				<br>
				{{ Form::text('lastname', '') }}
			</p>
			<p>
				{{ Form::label('usernamelabel', 'username') }}
				<br>
				{{ Form::text('username', '') }}	
			</p>
			<p>
				{{ Form::label('passwordlabel', 'password') }}
				<br>
				{{ Form::password('password') }}
			</p>
			<p>
				{{ Form::label('confirmlabel', 'confirm') }}
				<br>
				{{ Form::password('confirm') }}
			</p>
			<p>
				{{ Form::label('roomlabel', 'room') }}
				<br>
				<select name="room" class="registeraccounttype">
					<option>single</option>
					<option>double</option>
				</select>
			</p>
			<p>
				<br>
				{{ Form::submit('register me', array('class' => 'registeraccount')) }}	
			</p>
			{{ Form::close() }}
			<h1>{{ $message }}</h1>
		</div>		
	</body>
</html>
