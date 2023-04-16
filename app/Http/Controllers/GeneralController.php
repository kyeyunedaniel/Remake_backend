<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class GeneralController extends Controller
{
    public function register(Request $request){

        // return "hello";
        $password = $request->input('password');
        $password = Hash::make($password);

        // return $password;
        
        // dd(carbon::now());

        try {
            // dd('name');
            User::insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password'=>$password,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
            // return ' user successfully created ';

        } catch (\Throwable $th) {
            return('there has been an issue');
        }

    }

}
