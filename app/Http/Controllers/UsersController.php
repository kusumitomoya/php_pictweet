<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tweet;
use App\User;
use Auth;

class UsersController extends Controller
{
  public function show()
  {
    $name = Auth::user()->name;
    $tweets = Tweet::where('user_id', Auth::user()->id)->orderBY('created_at', 'DESC')->paginate(5);

    return view('users.show')->with(array('name' => $name, 'tweets' => $tweets));
  }
}