<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class UserController extends Controller {

   public function results(Request $request)
   {
       return 'Hello, World!';
   }
}
