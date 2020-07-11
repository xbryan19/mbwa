<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test','ApiController@getRegList');

Route::post('newSubmitForm','ApiController@submitForm');

Route::post('login','LoginController@login');

Route::get('getInfo','ApiController@getInfo');

Route::get('getCheckpoint','MBWA@getCheckpoint');

Route::post('submitFindings','MBWA@submitFindings');

Route::get('getTeam','ApiController@getTeam');

// Route::get('getSection','ApiController@getSection');

Route::get('getTime','MBWA@getTime');

Route::get('test2',function(Request $req){
    $idNum = $req->input('idNum');
    return DB::select(DB::raw("SELECT * FROM MBWAEmployeeList('{$idNum}')"));
    // return DB::select(DB::connection('HRDSQL9')->raw("SELECT convert(VARCHAR(10), getdate(),108) AS DTName"));
    // return dd(DB::select(DB::raw("SELECT convert(VARCHAR(10), getdate(),108) AS Time")));
    // return dd(DB::connection('HRDSQL9')); <------server config
    // return DB::select(DB::raw("SELECT DISTINCT(Teams.TeamName),MBWAEmployeeList.*  FROM MBWAEmployeeList('{$idNum}') JOIN Teams ON Teams.TeamID = MBWAEmployeeList.TeamCode"));
    // return DB::select(DB::raw("SELECT DISTINCT(Teams.TeamName),Teams.TeamCode FROM MBWAEmployeeList('{$idNum}') JOIN Teams ON Teams.TeamID = MBWAEmployeeList.TeamCode"));
    // return App\Checkpoint::all();3
//     // return 'test';
//     // return DB::table('Employees')->where('EmployeeCode','37757')->get();
//     // return App\User::where('EmployeeCode',$idNum)->get();

    // return DB::select(DB::raw("SELECT * FROM Employees WHERE ResignationDate IS NULL AND
    // TeamCode = (SELECT TeamCode FROM Employees WHERE EmployeeCode = '{$idNum}')
    //  ORDER BY CASE WHEN DesignationID IS NULL THEN 99 ELSE DesignationID END"));

//     SELECT * FROM Employees WHERE TeamCode = (SELECT TeamCode FROM Employees WHERE EmployeeCode = '19150')
// ORDER BY CASE WHEN DesignationID IS NULL THEN 99 ELSE DesignationID END

//     // return DB::table('Employees');
});
