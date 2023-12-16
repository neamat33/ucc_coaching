<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SubjectAssignService
{

    public function get()
    {

        return DB::table('academic_subject_assign as asa')
            ->select(
                DB::raw('asa.class_id'),
                DB::raw('asa.status_id'),
                DB::raw('ab.branch_name'),
                DB::raw('ab.id_branch'),
                DB::raw('GROUP_CONCAT(DISTINCT ac.class_name ORDER BY ac.class_name SEPARATOR ", ") as class_name'),
                DB::raw('GROUP_CONCAT(DISTINCT sub.subject_name ORDER BY sub.subject_name SEPARATOR ", ") as subject_name')
            )
            ->leftJoin('academic_branch as ab', 'ab.id_branch', 'asa.branch_id')
            ->leftJoin('academic_class as ac', 'ac.id_class', 'asa.class_id')
            ->leftJoin('academic_subject as sub', 'sub.id_subject', 'asa.subject_id')
            ->where('asa.status_id', 1)
            ->groupBy('asa.class_id', 'asa.status_id', 'ab.branch_name', 'ab.id_branch');
            
    }
    public function add($data, $subject)
    {
        DB::table('academic_subject_assign')->insert([
            'class_id' => $data['class_id'],
            'branch_id' => $data['branch_id'],
            'subject_id' => $subject,
            'status_id' => 1,
        ]);
    }

    public function edit($branch_id,$id)
    {

      return DB::table('academic_subject_assign as asa')
      ->select(
          DB::raw('asa.branch_id'),
          DB::raw('br.branch_name'),
          DB::raw('asa.class_id'),
          DB::raw('ac.class_name'),
          DB::raw('GROUP_CONCAT(DISTINCT asa.subject_id ORDER BY asa.subject_id SEPARATOR ",") as subject_id')
      )
      ->leftJoin('academic_branch as br','asa.branch_id','br.id_branch')
      ->leftJoin('academic_class as ac','asa.class_id','ac.id_class')
      ->where('asa.status_id', 1)
      ->where('asa.class_id', $id)
      ->where('asa.branch_id', $branch_id)
      ->groupBy('asa.class_id','asa.branch_id','br.branch_name','ac.class_name')
      ->first();
            
    }
    public function update($branch_id,$class_id)
    {
        return DB::table('academic_subject_assign')->where('branch_id',$branch_id)->where('class_id',$class_id)->update([
            'status_id'=> 0,
        ]);
        
    }
    public function delete($id)
    {
        DB::table('academic_class')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
