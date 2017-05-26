<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}
	public function login()
	{
		return view('login', ['message' => '']);
	}
	public function register()
	{
		return view('register', ['message' => '']);
	}
	public function registerUser(Request $stuff)
	{
		$firstname = $stuff->input('firstname');
		$lastname = $stuff->input('lastname');
		$username = $stuff->input('username');
		$password = $stuff->input('password');
		$confirm = $stuff->input('confirm');

		$emptfirstname = isset($firstname);
		$emptlastname = isset($lastname);
		$emptusername = isset($username);
		$emptpassword = isset($password);
		$emptconfirm = isset($confirm);

		if (!$emptfirstname | !$emptlastname | !$emptusername | !$emptpassword | !$confirm)
		{
			return view('register', ['message' => 'Remember to fill in all the fields']);
		}
		if ($password!==$confirm)
		{
			return view('register', ['message' => 'Password and confirm must be the same']);
		}
		DB::table('users')->insert(
			['firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => $password]
		);
		return view('created', ['username' => $username]);
	}
	public function loginUser(Request $stuff)
	{
		$username = $stuff->input('username');
		$password = $stuff->input('password');

		$emptusername = isset($username);
		$emptpassword = isset($password);

		if (!$emptusername | !$emptpassword)
		{
			return view('login', ['message' => 'Don\'t forget to enter both fields...']);
		}
		$user = DB::table('users')->where('username', $username)->first();
		$pass = DB::table('users')->where('password', $password)->first();
		$emptuser = isset($user);
		$emptpass = isset($pass);

		if (!$emptuser | !$emptpass)
		{
			return view('login', ['message' => 'No account found that matches']);	
		}
		else
		{
			return view('userhome', ['username' => $username]);	
		}
	}
	public function home(Request $stuff)
	{
		return view('userhome', ['username' => $stuff->input('username')]);
	}
}
