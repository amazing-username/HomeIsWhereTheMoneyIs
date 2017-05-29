
<html>
	<head>
	<title>HomeIsWhereTheMoneyIs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	</head>
	<body style="background-color:#eee">
		<div class="jumbotron text-center">
			<h1>Registration Page</h1>
			<a href="/"><h1>Home</h1></a>
			<!--
			<a href="stunt"><button style="height:40%;width:40%"><h1 style="font-size:1000%">Login</h1></button><br></a>
			<button style="height:20%;width:20%"><h1 style="font-size:500%">Register</h1></button>
			-->
			{{ Form::open(array('action' => 'HomeController@registerUser', 'method' => 'post')) }}
				<p>
					{{ Form::label('first name') }}
					{{ Form::text('firstname') }}	
				</p>
				<p>
					{{ Form::label('last name') }}
					{{ Form::text('lastname') }}
				</p>
				<p>
					{{ Form::label('username') }}
					{{ Form::text('username') }}	
				</p>
				<p>
					{{ Form::label('password') }}
					{{ Form::password('password') }}
				</p>
				<p>
					{{ Form::label('confirm') }}	
					{{ Form::password('confirm') }}
				</p>
				<p>
					{{ Form::label('roomlabel') }}
					{{ Form::select('room', array('single' => 'single', 'double' => 'double')) }}
				</p>
				<p>
					{{ Form::submit('register me') }}	
				</p>
			{{ Form::close() }}
			<h1>{{ $message }}</h1>
		</div>		
	</body>
</html>
