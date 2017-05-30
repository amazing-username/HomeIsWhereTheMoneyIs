
<html>
	<head>
	<title>HomeIsWhereTheMoneyIs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">	
		.test
{
height: 30%;
}
		.test2 {
			height:50%;
		}
	</style>
	</head>
	<body style="background-color:#eee">
		<div class="jumbotron text-center">
			<h1>What's good {{$username}}? it's your home page</h1>	
			<br><br>

			{!! Form::open(array('action' => 'BillController@create')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
			{{ Form::button('create', array('style' => 'height:30%;width:80%;font-size:800%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}

			{!! Form::open(array('action' => 'BillController@manage')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
			{{ Form::button('mange', array('style' => 'height:30%;width:80%;font-size:800%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
			{!! Form::open(array('action' => 'BillController@view')) !!}

			{{ Form::hidden('username', $username) }}
			<p>
			{{ Form::button('view', array('style' => 'height:30%;width:80%;font-size:800%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
		</div>		
	</body>
</html>
