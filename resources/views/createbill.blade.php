
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
			{!! Form::open(array('action' => 'HomeController@home')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
			<div style="background-color:#000000">
			{{ Form::button('user home', array('style' => 'height:15%;width:100%;font-size:500%;background-color:#000000;color:#eee', 'type' => 'submit')) }}
			</div>
			</p>
			{!! Form::close() !!}
		<div class="jumbotron text-center">
			<h1>Alright {{ $username }}, here is where you can create bills</h1>
			<br>

			{!! Form::open(array('action' => 'BillController@createbill')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
				{{ Form::label('lbl', 'bill name', array('style' => 'font-size:500%')) }}
			</p>
			<p>
				{{ Form::text('billname', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>
			<p>
			{{ Form::button('Create Bill', array('style' => 'height:20%;width:70%;font-size:500%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
			<h1>{{$message}}</h1>
		</div>		
	</body>
</html>
