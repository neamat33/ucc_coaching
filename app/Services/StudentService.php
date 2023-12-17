<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class StudentService
{

    public function get()
    {
        return DB::table('student_info as student')
        ->select('student.*','ab.branch_name','ac.class_name','section.section_name','shift.shift_name')
        ->leftJoin('student_class_assignment as sca','student.id_student','sca.student_id')
        ->leftJoin('academic_branch as ab','ab.id_branch','sca.branch_id')
        ->leftJoin('academic_class as ac','ac.id_class','sca.class_id')
        ->leftJoin('academic_section as section','section.id_section','sca.section_id')
        ->leftJoin('academic_shift as shift','shift.id_shift','sca.shift_id')
        ->where('ac.status_id',1);
        
    }
    public function add($data){
        return DB::table('student_info')->insertGetId([
            'student_name'=>$data['student_name'],
            'mobile'=>$data['father_mobile'],
            'email'=>$data['email'],
            'dob'=>$data['dob'],
            'father_name'=>$data['father_name'],
            'mother_name'=>$data['mother_name'],
            'father_mobile'=>$data['father_mobile'],
            'mother_mobile'=>$data['mother_mobile'],
            'father_email'=>$data['father_email'],
            'mother_email'=>$data['mother_email'],
            'present_address'=>$data['present_address'],
            'permanent_address'=>$data['permanent_address'],
            'status_id'=> 1,
        ]);        
    }

    public function classAssignment($data,$id){
        return DB::table('student_class_assignment')->insert([
            'student_id'=>$id,
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'section_id'=>$data['section_id'],
            'shift_id'=>$data['shift_id'],
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

    public function getSection($branch_id,$class_id)
    {
        
        $sections = DB::table('academic_class_settings as acs')
            ->select('sec.section_name','acs.section_id')
            ->leftJoin('academic_section as sec','acs.section_id','sec.id_section')
            ->where('acs.status_id', 1)
            ->where('acs.class_id', $class_id)
            ->where('acs.branch_id', $branch_id)
            ->get();
        
        if ($sections) {
            echo "<option value='' disabled selected>--Select--</option>";
            foreach ($sections as $value) {
                echo "<option value='$value->section_id'> $value->section_name</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
}
