
<html>
	<head>
	<title>Paycheck Calculator</title>
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
		<div style="background-color:#000000;text-align:center">
			<a href="/"><h1 style="height:10%;font-size:800%">Home</h1></a>
		</div>
		<div class="jumbotron text-center">
			<h1>Bi-weekly paycheck calculator</h1>	
			<br><br>
			{!! Form::open(array('action' => 'PaycheckController@results')) !!}
				<p>
					{{ Form::label('hourslbl', 'hours') }}
				</p>
				<p>
					{{ Form::text('hours') }}
				</p>
				<p>
					{{ Form::label('payratelbl', 'payrate') }}
				</p>
				<p>
					{{ Form::text('payrate') }}
				</p>
				<p>
					{{ Form::button('do it', array('type' => 'submit')) }}
				</p>
			{!! Form::close() !!}
			@if ($hours!=='d')
				<label style="font-size:500%">Hours: {{ $hours }}</label>
				<br>
				<label>Pay rate: {{ $payrate }}</label>
				<br>
				<label>Gross pay: {{ $grosspay }}</label>
				<br>
				<label>Net pay: {{ $netpay }}</label>
				<br>
				<label>Federal tax: {{ $fedtax }}</label>
				<br>
				<label>State tax: {{ $statetax }}</label>
				<br>
				<label>Social Security tax: {{ $sstax }}</label>
				<br>
				<label>Medicare tax: {{ $medtax }}</label>
				<br>
			@endif
			@if ($hours==='d')
				<h1>Remember to fill in all the fields</h1>
			@endif	
		</div>		
	</body>
</html>
