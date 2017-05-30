<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
	public function create(Request $stuff)
	{
		return view('createbill', ['username' => $stuff->input('username'), 'message' => '']);
	}
	public function createbill(Request $stuff)
	{
		$billname = $stuff->input('billname');
		$emptbillname = isset($billname);
		if (!$emptbillname)
		{
			return view('createbill', ['username' => $stuff->input('username'), 'message' => 'Enter something in the bills...']);
		}
		
		DB::table('bills')->insert([
			'billname' => $billname, 'username' => $stuff->input('username')
		]);
		return view('createbill', ['username' => $stuff->input('username'), 'message' => 'Bill created']);
	}
	public function manage(Request $stuff)
	{
		$test = DB::table('bills')->where('username', $stuff->input('username'))->pluck('billname');
		$users = DB::table('users')->pluck('username');
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');

		return view('manage', ['username' => $stuff->input('username'), 'message' => ""])->with('test', $test)->with('users', $users)->with('payer', '')->with('bills', '')->with('amountpaids', '')->with('totals', '')->with('responsibleid', $responsibleid)->with('count', '0');
	}
	public function managebill(Request $stuff)
	{
		$test = DB::table('bills')->where('username', 'juice')->pluck('billname');
		$users = DB::table('users')->pluck('username');
		$username = $stuff->input('username');
		$billname = $stuff->input('billname');
		$date = $stuff->input('date');
		$total = $stuff->input('total');
		$each = $stuff->input('each');
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');


		$emptdate = isset($date);
		$empttotal = isset($total);
		$empteach = isset($each);

		if (!$emptdate | !$empttotal | !$empteach)
		{
			return view('manage', ['username' => $username, 'message' => "Remeber to fill in all of the fields"])->with('test', $test)->with('users', $users)->with('payer', '')->with('bills', '')->with('amountpaids', '')->with('totals', '')->with('responsibleid', $responsibleid)->with('count', '');
		}
		else
		{
			$responsibleid = $date . $billname;
			DB::table('transactions')->insert([
				'billname' => $billname, 'date' => $date, 'cost' => $total, 'responsible' => $responsibleid, 'username' => $username, 'people' => $each
			]);
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');
			return view('manage', ['username' => $username, 'message' => "The bill has been posted for others to see"])->with('test', $test)->with('users', $users)->with('payer', '')->with('bills', '')->with('amountpaids', '')->with('totals', '')->with('responsibleid', $responsibleid)->with('count','');
		}
	}
	public function addpeople(Request $stuff)
	{
		$test = DB::table('bills')->where('username', $stuff->input('username'))->pluck('billname');
		$users = DB::table('users')->pluck('username');
		$date = $stuff->input('date');
		$username = $stuff->input('username');
		$billname = $stuff->input('billname');
		$payer = $stuff->input('payer');
		$amountpaid = $stuff->input('amountpaid');
		$amountpaids = DB::table('responsible')->where('username', $payer)->pluck('amountpaid');
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');
		$count = $amountpaids->count();
		if ($billname !== "Rent" | $billname !== "rent")
		{
			echo "Not equal" . "<br>";
			$id = $date . $billname;
			$cost = DB::table('transactions')->where('responsible', $id)->pluck('cost')->first();
			$people = DB::table('transactions')->where('responsible', $id)->pluck('people')->first();
			$full = ($cost * 100) / ($people * 100);
			echo $id . $billname . $payer . $amountpaid . $full . $username;
			DB::table('responsible')->insert(
				['id' => $id, 'billname' => $billname, 'username' => $payer, 'amountpaid' => $amountpaid, 'total' => $full, 'owner' => $username]
			);
		}
		else
		{
			echo "It's the rent bill" . "<br>";
			$id = $date . $billname;
			$cost = DB::table('transactions')->where('responsible', $id)->pluck('cost')->first();
			$roomtype = DB::table('users')->where('username', $payer)->pluck('room')->first();
			if ($roomtype === 'Single' | $roomtype === 'single')
			{
				DB::table('responsible')->insert(
					['id' => $id, 'billname' => $billname, 'username' => $payer, 'amountpaid' => $amountpaid, 'total' => '292', 'owner' => $username]);
			}
			else
			{
				DB::table('responsible')->insert(	
					['id' => $id, 'billname' => $billname, 'username' => $payer, 'amountpaid' => $amountpaid, 'total' => '262', 'owner' => $username]);
			}
		}
	
		return view('manage', ['username' => $username, 'message' => $payer . " has been added to the bill"])->with('test', $test)->with('users', $users)->with('payer', '')->with('bills', '')->with('amountpaids', $amountpaids)->with('totals', '')->with('responsibleid', $responsibleid)->with('count', '');
	}
	public function calcbill(Request $stuff)
	{
		$test = DB::table('bills')->where('username', $stuff->input('username'))->pluck('billname');
		$users = DB::table('users')->pluck('username');
		$payer = $stuff->input('payer');
		$bills = DB::table('responsible')->where('username', $payer)->pluck('billname');
		$amountpaids = DB::table('responsible')->where('username', $payer)->pluck('amountpaid');
		$totals = DB::table('responsible')->where('username', $payer)->pluck('total');
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');
		$count = $amountpaids->count();

		DB::table('responsible')->where('id', $stuff->input('responsibleid'))->update(['amountpaid' => $stuff->input('amountpaid')]);
		echo $stuff->input('amountpaid') . "<br>";

		return view('manage', ['username' => $stuff->input('username'), 'message' => ''])->with('test', $test)->with('users', $users)->with('payer', $payer)->with('bills', $bills)->with('amountpaids', $amountpaids)->with('totals', $totals)->with('responsibleid', $responsibleid)->with('count', $count);
	}
	public function debt(Request $stuff)
	{
		$test = DB::table('bills')->where('username', 'juice')->pluck('billname');
		$users = DB::table('users')->pluck('username');
		$payer = $stuff->input('payer');
		$bills = DB::table('responsible')->where('username', $payer)->pluck('billname');
		$amountpaids = DB::table('responsible')->where('username', $payer)->pluck('amountpaid');
		$totals = DB::table('responsible')->where('username', $payer)->pluck('total');
		$responsibleid = DB::table('responsible')->where('owner', $stuff->input('username'))->pluck('id');
		$count = $amountpaids->count();

		echo $count . "<br>";
		
		return view('manage', ['username' => $stuff->input('username'), 'message' => ''])->with('test', $test)->with('users', $users)->with('payer', $payer)->with('bills', $bills)->with('amountpaids', $amountpaids)->with('totals', $totals)->with('responsibleid', $responsibleid)->with('count', $count);
	}
	public function view(Request $stuff)
	{
		$grass = DB::table('bills')->pluck('billname');
		return view('view', ['username' => $stuff->input('username')])->with('grass', $grass)->with('billname', '')->with('owner', '')->with('amountpaid', '')->with('total', '');
	}
	public function viewbill(Request $stuff)
	{
		$grass = DB::table('bills')->pluck('billname');
		$billchoice = $stuff->input('tough');
		$owner = DB::table('responsible')->orderBy('id', 'desc')->where('username', $stuff->input('username'))->pluck('owner')->first();
		$amountpaid = DB::table('responsible')->orderBy('id', 'desc')->where('username', $stuff->input('username'))->pluck('amountpaid')->first();
		$total = DB::table('responsible')->orderBy('id', 'desc')->where('username', $stuff->input('username'))->pluck('total')->first();

		echo "Hey " . $stuff->input('username') . " you chose: ";
		echo $stuff->input('tough');
		echo "<br>";	
		
		return view('view', ['username' => $stuff->input('username')])->with('grass', $grass)->with('billname', $billchoice)->with('owner', $owner)->with('amountpaid', $amountpaid)->with('total', $total);
	}
}
