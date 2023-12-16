<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClassSetupService
{

    public function get()
    {
    return DB::table('academic_class_settings as acs')
      ->select(
          DB::raw('acs.class_id'),
          DB::raw('acs.status_id'),
          DB::raw('ab.branch_name'),
          DB::raw('ab.id_branch'),
          DB::raw('GROUP_CONCAT(DISTINCT ac.class_name ORDER BY ac.class_name SEPARATOR ", ") as class_name'),
          DB::raw('GROUP_CONCAT(DISTINCT sec.section_name ORDER BY sec.section_name SEPARATOR ", ") as section_name')
      )
      ->leftJoin('academic_branch as ab', 'ab.id_branch', 'acs.branch_id')
      ->leftJoin('academic_class as ac', 'ac.id_class', 'acs.class_id')
      ->leftJoin('academic_section as sec', 'sec.id_section', 'acs.section_id')
      ->where('acs.status_id', 1)
      ->groupBy('acs.class_id','acs.status_id','ab.branch_name','ab.id_branch');

            
    }
    public function add($data,$section){
       return DB::table('academic_class_settings')->insert([
            'class_id'=>$data['class_id'],
            'branch_id'=>$data['branch_id'],
            'section_id'=> $section,
            'status_id'=> 1,
        ]);        
    }

    public function edit($branch_id,$id)
    {

      return DB::table('academic_class_settings as acs')
      ->select(
          DB::raw('acs.branch_id'),
          DB::raw('br.branch_name'),
          DB::raw('acs.class_id'),
          DB::raw('ac.class_name'),
         
          DB::raw('GROUP_CONCAT(DISTINCT acs.section_id ORDER BY acs.section_id SEPARATOR ",") as section_id')
      )
      ->leftJoin('academic_branch as br','acs.branch_id','br.id_branch')
      ->leftJoin('academic_class as ac','acs.class_id','ac.id_class')
      ->where('acs.status_id', 1)
      ->where('acs.class_id', $id)
      ->where('acs.branch_id', $branch_id)
      ->groupBy('acs.class_id','acs.branch_id','br.branch_name','ac.class_name')
      ->first();
            
    }

    public function update($branch_id,$class_id){
        return DB::table('academic_class_settings')->where('class_id',$class_id)->where('branch_id',$branch_id)->update([
            'status_id'=> 0,
        ]);
        
    }
    public function delete($id){
        DB::table('academic_class_settings')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
