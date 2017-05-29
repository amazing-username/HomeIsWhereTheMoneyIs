
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

			{!! Form::open(array('action' => 'BillController@managebill')) !!}
			{{ Form::hidden('username', $username) }}
			<select name="billname">
				@foreach ($test as $bax)
					<option value={{ $bax }}>{{ $bax }}</option>
				@endforeach
			</select>
			<p>
			{{ Form::label('datelabel', "enter in yyyymm") }}
			{{ Form::text('date') }}
			</p>
			<p>
			{{ Form::label('totallabel', 'total bill amount') }}
			{{ Form::text('total') }}
			</p>
			<p>
			{{ Form::label('eachlabel', 'each bill amount') }}
			{{ Form::text('each') }}
			</p>
			{{ Form::button('Create Bill', array('style' => 'height:40%;width:70%', 'type' => 'submit')) }}
			</p>
			{!! Form::close() !!}
			<h1>{{ $message }}</h1>

			<div>
				<br><br>
				<h1>Add people to the bill</h1>
				{!! Form::open(array('action' => 'BillController@addpeople')) !!}
				{{ Form::hidden('username', $username) }}
				<p>
					<select name="billname">
						@foreach ($test as $bax)
							<option value={{ $bax }}>{{ $bax  }}</option>
						@endforeach
					</select>
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
					{{ Form::text('date') }}
				</p>
				<p>
					{{ Form::label('amountpaidlabel', 'amount paid') }}
					{{ Form::text('amountpaid') }}
				</p>

				<p>
					{{ Form::button('Add person', array('style' => '', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
			</div>
			<div>
				<br><br>
				<h1>Manage a bill</h1>
				{!! Form::open(array('action' => 'BillController@calcbill')) !!}
				{{ Form::hidden('username', $username) }}
				<p>
					<select name="billname">
						@foreach ($test as $bax)
							<option value={{ $bax }}>{{ $bax  }}</option>
						@endforeach
					</select>
				</p>
				<p>
					<select name="payer">
						@foreach ($users as $cax)
							<option value={{ $cax }}>{{ $cax }}</option>
						@endforeach
					</select>
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
					{{ Form::text('amountpaid') }}
				</p>
				<p>
					{{ Form::button('Add person', array('style' => '', 'type' => 'submit')) }}
				</p>
				{!! Form::close() !!}
			</div>
			<div>
				<br><br>
				<h1>Who owes you cash</h1>
				{!! Form::open(array('action' => 'BillController@debt')) !!}	
				{{ Form::hidden('username', $username) }}
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
					@for ($i = 0; $i < $count; ++$i)
						{{ $payer }} {{ $bills[$i] }} {{ $amountpaids[$i] }} {{ $totals[$i] }}  <br>
					@endfor
				@endif	
			</div>
		</div>		
	</body>
</html>
