
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
		<div style="background-color:#000000;text-align:center">
			<a href="/"><h1 style="height:10%;font-size:800%">Home</h1></a>
		</div>
		<div class="jumbotron text-center">
			<h1 style="font-size:800%">Registration Page</h1>
			<br>
			{{ Form::open(array('action' => 'HomeController@registerUser', 'method' => 'post')) }}
				<p>
					{{ Form::label('firstnamelabel', 'first name', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					{{ Form::text('firstname', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}	
				</p>
				<p>
					{{ Form::label('lastnamelabel', 'last name', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					{{ Form::text('lastname', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
				</p>
				<p>
					{{ Form::label('usernamelabel', 'username', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					{{ Form::text('username', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}	
				</p>
				<p>
					{{ Form::label('passwordlabel', 'password', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					{{ Form::password('password', array('style' => 'width:70%;height:15%;font-size:500%')) }}
				</p>
				<p>
					{{ Form::label('confirmlabel', 'confirm', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					{{ Form::password('confirm', array('style' => 'width:70%;height:15%;font-size:500%')) }}
				</p>
				<p>
					{{ Form::label('roomlabel', 'room', array('style' => 'width:60%;height:20%;font-size:500%')) }}
					<br>
					<select name="room" style="width:70%;height:20%;font-size:500%">
						<option>single</option>
						<option>double</option>
					</select>
				</p>
				<p>
					<br>
					{{ Form::submit('register me', array('style' => 'width:70%;height:25%;font-size:500%')) }}	
				</p>
			{{ Form::close() }}
			<h1>{{ $message }}</h1>
		</div>		
	</body>
</html>
