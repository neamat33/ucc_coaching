<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SectionService
{

    public function get()
    {
        return  DB::table('academic_section as sec')
        ->select('sec.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id_branch','sec.branch_id')
        ->where('sec.status_id',1);
                  
    }
    public function add($data){
        DB::table('academic_section')->insert([
            'section_name'=>$data['section_name'],
            'branch_id'=>$data['branch_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_section')->where('id_section', $id)->update([
            'section_name'=>$data['section_name'],
            'branch_id'=>$data['branch_id'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_section')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
