<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SubjectAssignService
{

    public function get()
    {
        return DB::table('academic_subject_assign as asa')
        ->select('asa.id_subject_assign as id_assign','ab.branch_name','ac.class_name','sub.subject_name','asa.status_id')
        ->leftJoin('academic_branch as ab','ab.id_branch','asa.branch_id')
        ->leftJoin('academic_class as ac','ac.id_class','asa.class_id')
        ->leftJoin('academic_subject as sub','sub.id_subject','asa.subject_id')
        ->where('asa.status_id',1);
            
    }
    public function add($data,$subject){
        DB::table('academic_subject_assign')->insert([
            'class_id'=>$data['class_id'],
            'branch_id'=>$data['branch_id'],
            'subject_id'=> $subject,
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_class')->where('id_class', $id)->update([
            'class_name'=>$data['class_name'],
            'branch_id'=>$data['branch_id'],
        ]);
        
    }
    public function delete($id){
        DB::table('academic_class')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
