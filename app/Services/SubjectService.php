<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SubjectService
{

    public function get()
    {
        return  DB::table('academic_subject as sub')
        ->select('sub.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id_branch','sub.branch_id')
        ->where('sub.status_id',1);          
    }
    public function add($data){
        DB::table('academic_subject')->insert([
            'subject_name'=>$data['subject_name'],
            'branch_id'=>$data['branch_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_subject')->where('id_subject', $id)->update([
            'subject_name'=>$data['subject_name'],
            'branch_id'=>$data['branch_id'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_subject')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
