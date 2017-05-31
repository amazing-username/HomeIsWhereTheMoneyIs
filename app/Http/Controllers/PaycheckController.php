<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaycheckController extends Controller
{
    //
	public function display()
	{
		return view('paycheck', ['hours' => '', 'payrate' => '', 'grosspay' => '', 'netpay' => '', 'fedtax' => '', 'statetax' => '', 'sstax' => '', 'medtax' => '']);
	}
	public function results(Request $stuff)
	{
		$hours = $stuff->input('hours');
		$payrate = $stuff->input('payrate');
		$grosspay;
		$netpay;
		$fedtax;
		$statetax;
		$sstax;
		$medtax;
		$totaltax;

		$empthours = isset($hours);
		$emptpayrate = isset($payrate);

		if (!$empthours | !$emptpayrate)
		{
			return view('paycheck', ['hours' => 'd', 'payrate' => '', 'grosspay' => '', 'netpay' => '', 'fedtax' => '', 'statetax' => '', 'sstax' => '', 'medtax' => '']);
		}

		$grosspay = $hours * $payrate;
		if ($grosspay < 87)
		{
			$fedtax = 0;
		}
		else if ($grosspay >= 87 && $grosspay < 443)
		{
			$fedtax = floor(($grosspay - 88.50) * .10 * 100)/100;
		}
		else if ($grosspay >= 443 && $grosspay < 1529)
		{
			$fedtax = floor(($grosspay - 208.00) * .15 * 100)/100;
		}
		else if ($grosspay <= 1529 && $grosspay < 3925)
		{
			$fedtax = floor(($grosspay - 744.04) * .25 * 100)/100;
		}
		
		$statetax = round($grosspay * .0375 * 100)/100;
		
		if ($hours >=26)
		{
			$sstax = round(($grosspay * .062) * 100)/100;
		}
		else
		{
			$sstax = 0;
		}
		
		if ($hours >= 26)
		{
			$medtax = round(($grosspay * .0145) * 100)/100;
		}
		else
		{
			$medtax = 0;
		}
		

		$totaltax = $fedtax + $statetax + $sstax + $medtax;
		$netpay = $grosspay - $totaltax;
		
		
		return view('paycheck', ['hours' => $hours, 'payrate' => $payrate, 'grosspay' => $grosspay, 'netpay' => $netpay, 'fedtax' => $fedtax, 'statetax' => $statetax, 'sstax' => $sstax, 'medtax' => $medtax]);
	}
}
