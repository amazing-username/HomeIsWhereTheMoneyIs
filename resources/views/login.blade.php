
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
			<h1 style="font-size:800%">Login Page</h1>
			<br>
			{{ Form::open(array('action' => 'HomeController@loginUser')) }}
			<p>
				{{ Form::label("usernamelabel", 'username', array('style' => 'width:50%;height:20%;font-size:500%')) }}
				<br>
				{{ Form::text("username", '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>	
			<p>
				{{ Form::label("passwordlabel", 'password', array('style' => 'width:50%;height:20%;font-size:500%')) }}
				<br>
				{{ Form::password("password", array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>
			<p>
				<br>
				{{ Form::submit("Login", array('style' => 'width:70%;height:25%;font-size:500%')) }}
			</p>
			{{ Form::close() }}
			<h1>{{ $message }}</h1>
		</div>		 
	</body>
</html>
