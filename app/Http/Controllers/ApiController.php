<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ApiController extends Controller
{

    public function getInfo(Request $req){
        $idNum = $req->input('idNum');
        // return 'test';
        // return DB::table('Employees')->where('EmployeeCode','37757')->get();
        // return App\User::where('EmployeeCode',$idNum)->get();
        return DB::select(DB::raw("SELECT * FROM MBWAEmployeeList('{$idNum}')"));
        // return DB::select(DB::raw("SELECT * FROM Employees INNER JOIN Teams ON Teams.TeamID = Employees.TeamCode WHERE ResignationDate IS NULL AND
        // Teams.TeamID = (SELECT TeamCode FROM Employees WHERE EmployeeCode = '{$idNum}')
        // ORDER BY CASE WHEN DesignationID IS NULL THEN 99 ELSE DesignationID END"));

    }

    public function getTeam(Request $req){
        $idNum = $req->input('idNum');
        return DB::select(DB::raw("SELECT DISTINCT(Teams.TeamName),Teams.TeamCode FROM MBWAEmployeeList('{$idNum}') JOIN Teams ON Teams.TeamID = MBWAEmployeeList.TeamCode"));
    }
    
    // public function getSection(){
    //     $idNum = $req->input('idNum');
    //     return DB::select(DB::raw("SELECT * FROM MBWAEmployeeList('{$idNum}')"));
    // }

   
    
    // public function submitForm(Request $req){
    //     // insert
    //     // Car::insert([
    //     //     'car_name' => $req['carName']
    //     // ]);

    //     // Registration::insert([
    //     //     'user_name' => $req['UserName'],
    //     //     'password' => $req['Password'],
    //     //     'first_name' => $req['FirstName'],
    //     //     'middle_name' => $req['MiddleName'],
    //     //     'last_name' => $req['LastName']
    //     // ]);

    //     //update
    //     Registration::where('register_id',1013)->update([
    //         'user_name' => $req['UserName'],
    //         'password' => $req['Password'],
    //         'first_name' => $req['FirstName'],
    //         'middle_name' => $req['MiddleName'],
    //         'last_name' => $req['LastName']
    //     ]);

     

    //     //delete
    //     // Car::where('car_id',11)->delete();
            
    //     // return Car::all();

    //     // return Car::where('car_id',1)->get();

    //     // return Car::select('model.model_name','cars.car_name')
    //     // ->where('cars.car_id',2)
    //     // ->join('model','model.car_id','cars.car_id')
    //     // ->get();

    //     // try{
    //     //     DB::BeginTransaction()

    //     //     DB::commit();
    //     // }catch(ModelException $e){
    //     //     DB::rollback();
    //     // }

    // }
}
