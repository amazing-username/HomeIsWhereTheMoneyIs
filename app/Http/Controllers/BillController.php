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
		return view('manage', ['username' => $stuff->input('username')]);
	}
	public function view(Request $stuff)
	{
		//DB::table('users')->where('username', $username)->first();	
		//$bills[] = dDB::table('bills')->where('')
		$billrecord = DB::table('bills')->get();
		$bills;
		foreach ($billrecord as $bill) {
			echo $bill->billname;
			echo "<br>";
			$bills[] = $bill->billname;
		}
		foreach ($bills as $w) {
			echo $w;
			echo "<br>";
		}
		return view('view', ['username' => $stuff->input('username')])->with('billrecord', $billrecord);
		//return view('view', ['username' => $stuff->input('username')])->with('bills', $bills);
	}
}
