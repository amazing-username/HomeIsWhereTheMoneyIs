
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
		input {
			width:70%;
			height:20%;
			font-size:500%;
}
		select {
			width:70%;
			height:20%;
			font-size:500%;
}
		label {
			font-size:500%;
}
		button {
			width:70%;
			height:20%;
			font-size:500%;
}
	</style>
	
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
			<h1>Alright {{ $username }}, here is where you can view bills that you need to pay...</h1>

			{!! Form::open(array('action' => 'BillController@viewbill')) !!}
			{{ Form::hidden('username', $username) }}
			<select name='tough'>
				@foreach ($grass as $record)
					<option value={{ $record }}>{{ $record }}</option>
				@endforeach
			</select>
			<p>
			{{ Form::button('view bills', array('style' => 'height:40%;width:70%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
			<div>
				<table style="width:100%;font-size:300%">
					<tr>
						<th>bill name</th>
						<th>amount paid</th>
						<th>total</th>
						<th>owner</th>
					</tr>
					<tr>
						<td>{{ $billname }}</td>
						<td>{{ $amountpaid }}</td>
						<td>{{ $total }}</td>
						<td>{{ $owner }}</td>
					</tr>
				</table>
			</div>
		</div>		
	</body>
</html>
