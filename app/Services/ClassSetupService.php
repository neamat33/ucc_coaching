<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClassSetupService
{

    public function get()
    {
        return DB::table('academic_class_settings as acs')
        ->select('acs.id_class_settings as id_setup','ab.branch_name','ac.class_name','sec.section_name','acs.status_id')
        ->leftJoin('academic_branch as ab','ab.id_branch','acs.branch_id')
        ->leftJoin('academic_class as ac','ac.id_class','acs.class_id')
        ->leftJoin('academic_section as sec','sec.id_section','acs.section_id')
        ->where('acs.status_id',1);
            
    }
    public function add($data,$section){
        DB::table('academic_class_settings')->insert([
            'class_id'=>$data['class_id'],
            'branch_id'=>$data['branch_id'],
            'section_id'=> $section,
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
