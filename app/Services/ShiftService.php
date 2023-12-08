<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ShiftService
{

    public function get()
    {
        return  DB::table('academic_shift as shift')
        ->select('shift.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id_branch','shift.branch_id')
        ->where('shift.status_id',1);
                 
    }
    public function add($data){
        DB::table('academic_shift')->insert([
            'shift_name'=>$data['shift_name'],
            'shift_start'=>$data['shift_start'],
            'shift_end'=>$data['shift_end'],
            'branch_id'=>$data['branch_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_shift')->where('id_shift', $id)->update([
            'shift_name'=>$data['shift_name'],
            'shift_start'=>$data['shift_start'],
            'shift_end'=>$data['shift_end'],
            'branch_id'=>$data['branch_id'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_shift')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
