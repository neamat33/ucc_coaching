<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClassService
{

    public function get()
    {
        return DB::table('academic_class as ac')
        ->select('ac.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id_branch','ac.branch_id')
        ->where('ac.status_id',1);

            
    }
    public function add($data){
        DB::table('academic_class')->insert([
            'class_name'=>$data['class_name'],
            'branch_id'=>$data['branch_id'],
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
