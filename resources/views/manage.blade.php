
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
			{!! Form::open(array('action' => 'HomeController@home')) !!}
			{{ Form::hidden('username', $username) }}
			<p>
			<div>
			{{ Form::button('user home', array('class' => 'userhome', 'type' => 'submit')) }}
			</div>
			</p>
			{!! Form::close() !!}
		<div class="jumbotron text-center maincontentarea">
			<h1>Alright {{ $username }}, here is where you can manage the bills you own</h1>
			<br><br>

			<div><h1 class="addbillmonthsection">
			{!! Form::open(array('action' => 'BillController@managebill')) !!}
			{{ Form::hidden('username', $username) }}
			<br>
			<p>
				{{ Form::label('billnamelabel', 'billname', array('style' => 'font-size:500%'))}}
			</p>
			<p>
			<select name="billname">
				@foreach ($test as $bax)
					<option value={{ $bax }}>{{ $bax }}</option>
				@endforeach
			</select>
			</p>
			<p>
			{{ Form::label('datelabel', "enter date in yyyymm") }}
			</p>
			<p>
			{{ Form::text('date', '') }}
			</p>
			<p>
			{{ Form::label('totallabel', 'total bill amount') }}
			</p>
			<p>
			{{ Form::text('total', '') }}
			</p>
			<p>
			{{ Form::label('eachlabel', 'how many people') }}
			</p>
			<p>
			{{ Form::text('each', '') }}
			</p>
			{{ Form::button('add bill', array('class' => 'createbillmonthamount', 'type' => 'submit')) }}
			<br><br>
			<h1>{{ $message }}</h1>
			</p>
			{!! Form::close() !!}
			</h1>
			</div>
			<div class="addpeoplesection">
				<br><br>
				<h1>Add people to the bill</h1>
				{!! Form::open(array('action' => 'BillController@addpeople')) !!}
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
					{{ Form::button('add payer', array('class' => 'addpeople', 'type' => 'submit')) }}
				<br><br>
				</p>
				{!! Form::close() !!}
			</div>
			<div class="managebill">
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
					{{ Form::button('update payer', array('class' => 'managebill', 'type' => 'submit')) }}
				<br><br>
				</p>
				{!! Form::close() !!}
			</div>
			<div class="debtors">
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
					{{ Form::button('check', array('class' => 'viewdebtors', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
				{{ $empt = isset($payer) }}
				@if (!$empt)
					nothing
				@endif
				@if ($empt)
					<table>
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
			<button class="logout"><a href="/">log out</a></button>
		</div>		
	</body>
</html>
