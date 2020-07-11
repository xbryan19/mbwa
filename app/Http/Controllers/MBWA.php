<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Checkpoint;
use App\OverallFindings;
use App\StaffFindings;

class MBWA extends Controller
{
    public function getCheckpoint(Request $req){
        return Checkpoint::all();
    }   

    public function getTime(){
        return DB::select(DB::raw("SELECT convert(VARCHAR(10), getdate(),108) AS Time"));
    }

    public function submitFindings(Request $req){

        foreach($req->StaffFindings as $key => $val){
            foreach($val as $k => $v){
               echo  $v['EmployeeCode'];
               echo '<br>';
            }
        }
        return false;

        try {
            DB::beginTransaction();

            
            $overallfindings = [];
            foreach($req->OverallFindings as $key=>$val){
                $overallfindings[] = [
                        'ControlNo' => $req->controlno,
                        'TimeChecked' => $req->Time,
                        'CheckpointID' => $key+1,
                        'TotalPerCheckpoints' => $val,
                        'CreatedDate' => date('Y/m/d H:i:s'),
                        'UpdatedDate' => date('Y/m/d H:i:s'),
                        'UpdatedBy' => $req->user,
                ];
            }
            // return OverallFindings::all();
            OverallFindings::insert($overallfindings);


            // $emp = $req->StaffFindings[0].$EmployeeCode
            // $staff_findings = [];
            // foreach($req->StaffFindings as $key=>$val){
            //     $staff_findings[] = [
            //         'ControlNo' => $req->controlno,
            //         'StaffID' =>
            //     ];
            // }


            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
      
    }
}
