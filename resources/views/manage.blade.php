
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
			<h1>Alright {{ $username }}, here is where you can manage the bills you own bills</h1>
			{!! Form::open(array('action' => 'HomeController@home')) !!}

			{{ Form::hidden('username', $username) }}
			<p>
			{{ Form::button('user Home', array('style' => 'height:40%;width:70%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}

			{!! Form::open(array('action' => 'BillController@createbill')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
				{{ Form::label('lbl', 'bill name', array('style' => 'font-size:400%')) }}
				{{ Form::text('billname', '', array('style' => 'font-size:400%')) }}
			</p>
			<p>
			{{ Form::button('Create Bill', array('style' => 'height:40%;width:70%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
		</div>		
	</body>
</html>
