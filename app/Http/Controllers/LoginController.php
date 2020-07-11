<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $req) {
        $credentials = [
            'user' => $req->user,
            'pass' => $req->pass
        ];

        $user = User::where('Employees.EmployeeCode',$credentials['user'])
                ->where('Employees.EmployeeCode',$credentials['pass'])
                ->join('Positions','Positions.PositionID',"Employees.PositionID")
                ->join('Sections','Sections.SectionID',"Employees.SectionCode")
                ->join('Teams','Teams.TeamID',"Employees.TeamCode")
                ->get();

        if(count($user) !=0 ){
            return response($user, 201);
        }else{
            return 'Invalid Credentials!!';
        }
        // $credentials->validate([
        //     'name'=> 'required',
        //     'password' => ['required'
        // ]);
        // return $req;
        

        // if(Auth::attempt($credentials)){
        //     $user = User::where('EmployeeCode', $credentials['EmployeeCode'])->first();
        //     $response = [
        //         'user'=> $user
        //     ];

        //     return response($response, 201);
        // }
        // else {
        //     return 'Invalid Credentials!!';
        // }
        
        // throw ValidationException::withMessages([
        //     'user' => ['The provided credentials are incorrect!']
        // ]);

        

    }

}
