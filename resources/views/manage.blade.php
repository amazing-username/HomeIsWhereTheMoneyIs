
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
			<h1>Alright {{ $username }}, here is where you can manage the bills you own</h1>
			<br><br>

			{!! Form::open(array('action' => 'BillController@managebill')) !!}
			{{ Form::hidden('username', $username) }}
			<br>
			<p>
				{{ Form::label('billnamelabel', 'billname', array('style' => 'font-size:500%'))}}
			</p>
			<p>
			<select name="billname" style="width:70%;height:20%;font-size:500%">
				@foreach ($test as $bax)
					<option value={{ $bax }}>{{ $bax }}</option>
				@endforeach
			</select>
			</p>
			<p>
			{{ Form::label('datelabel', "enter date in yyyymm", array('style' => 'font-size:500%')) }}
			</p>
			<p>
			{{ Form::text('date', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>
			<p>
			{{ Form::label('totallabel', 'total bill amount', array('style' => 'font-size:500%')) }}
			</p>
			<p>
			{{ Form::text('total', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>
			<p>
			{{ Form::label('eachlabel', 'how many people', array('style' => 'font-size:500%')) }}
			</p>
			<p>
			{{ Form::text('each', '', array('style' => 'width:70%;height:15%;font-size:500%')) }}
			</p>
			{{ Form::button('add bill', array('style' => 'height:30%;width:70%;font-size:500%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
			<h1>{{ $message }}</h1>

			<div>
				<br><br>
				<h1>Add people to the bill</h1>
				{!! Form::open(array('action' => 'BillController@addpeople')) !!}
				{{ Form::hidden('username', $username) }}
				<p>
					{{ Form::label('billnamelbl', 'billname') }}
				</p>
				<p>
					<select name="billname" style="width:70%;height:20%;font-size:500%">
						@foreach ($test as $bax)
							<option value={{ $bax }}>{{ $bax  }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::label('payerlbl', 'payer') }}
				</p>
				<p>
					<select name="payer">
						@foreach ($users as $cax)
							<option value={{ $cax }}>{{ $cax }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::label('datelabel', 'date in yyyymm') }}
				</p>
				<p>
					{{ Form::text('date') }}
				</p>
				<p>
					{{ Form::label('amountpaidlabel', 'amount paid') }}
				</p>
				<p>
					{{ Form::text('amountpaid') }}
				</p>

				<p>
					{{ Form::button('add payer', array('style' => '', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
			</div>
			<div>
				<br><br>
				<h1>Manage a bill</h1>
				{!! Form::open(array('action' => 'BillController@calcbill')) !!}
				{{ Form::hidden('username', $username) }}
				<p>
					{{ Form::label('billnamelbl', 'billname') }}
				</p>
				<p>
					<select name="billname">
						@foreach ($test as $bax)
							<option value={{ $bax }}>{{ $bax  }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::label('payerlbl', 'payer') }}
				</p>
				<p>
					<select name="payer">
						@foreach ($users as $cax)
							<option value={{ $cax }}>{{ $cax }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::label('idlbl', 'bill id') }}
				</p>
				<p>
					<select name="responsibleid">
						@foreach ($responsibleid as $dax)
							<option value={{ $dax }}>{{ $dax }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::label('amountpaidlabel', 'amount paid') }}
				</p>
				<p>
					{{ Form::text('amountpaid') }}
				</p>
				<p>
					{{ Form::button('update payer', array('style' => '', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
			</div>
			<div>
				<br><br>
				<h1>Who owes you cash</h1>
				{!! Form::open(array('action' => 'BillController@debt')) !!}	
				{{ Form::hidden('username', $username) }}
				<p>
					{{ Form::label('payerlbl', 'payer') }}
				</p>
				<p>	
					<select name="payer">
						@foreach ($users as $cax)
							<option value={{ $cax }}>{{ $cax }}</option>
						@endforeach
					</select>
				</p>
				<p>
					{{ Form::button('check', array('style' => '', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
				{{ $empt = isset($payer) }}
				@if (!$empt)
					nothing
				@endif
				@if ($empt)
					<table style="width:100%;font-size:300%">
						<tr>
							<td>Payer</td>
							<td>Billname</td>
							<td>Amount paid</td>
							<td>Total</td>
						</tr>
					@for ($i = 0; $i < $count; ++$i)
						<tr>
							<td>{{ $payer }}</td>
							<td>{{ $bills[$i] }}</td>
							<td>{{ $amountpaids[$i] }}</td>
							<td>{{ $totals[$i] }}</td>
						</tr>
					@endfor
					</table>
				@endif	
			</div>
		</div>		
	</body>
</html>
