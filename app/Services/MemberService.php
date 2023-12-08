<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
class MemberService
{
    public function getDivision(){
       return DB::table('divisions')->get();
    }
    public function getUnions($id){
        $unions = DB::table('unions')->where('upazilla_id',$id)->get();
        if ($unions) {
            foreach ($unions as $value) {
                echo "<option value='$value->id'> $value->name ( $value->bn_name )</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
    public function getDistrict($id){
        $districts = DB::table('districts')->where('division_id',$id)->get();
        if ($districts) {
            foreach ($districts as $value) {
                echo "<option value='$value->id'> $value->name ( $value->bn_name )</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
    public function getUpazila($id){
        $upazilas = DB::table('upazilas')->where('district_id',$id)->get();
        if ($upazilas) {
            foreach ($upazilas as $value) {
                echo "<option value='$value->id'> $value->name ( $value->bn_name )</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
    public function get()
    {
        return DB::table('members as m')
            ->select('m.*', 'oc.name as occupation', 'dg.name as designation', 'up.name as upazila','un.name as union')
            ->leftjoin('occupations as oc', 'oc.id', 'm.occupation_id')
            ->leftjoin('designations as dg', 'dg.id', 'm.designation_id')
            ->leftjoin('upazilas as up', 'up.id', 'm.thana_id')
            ->leftjoin('unions as un', 'un.id', 'm.union_id')
            ->where('m.status_id', '!=', '2')
            ->orderBy('m.id','DESC')
            ->get();
    }
    public function add($data){
        DB::table('members')->insert([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'blood_group'=>$data['blood_group'],
            'join_date'=>$data['join_date'],
            'father_name'=>$data['father_name'],
            'mother_name'=>$data['mother_name'],
            'husband_wife_name'=>$data['husband_wife_name'],
            'organization'=>$data['organization'],
            'occupation_id'=>$data['occupation_id'],
            'designation_id'=>$data['designation_id'],
            'thana_id'=>$data['thana_id'],
            'union_id'=>$data['union_id'],
            'address'=>$data['address'],
            'uid_add' => 1
        ]);
        
    }
    public function update($data, $id){
        DB::table('product_category')->where('id_cat', $id)->update([
            'name'=>$data['name'],
            'parent_id'=>$data['parent_id'],
            'status_id'=> 1,
            'uid_add' => session('user_id')
        ]);
        
    }
    public function delete($id){
        DB::table('product_category')->where('id_cat', $id)->update([
            'status_id' => '2',
        ]);
    }
}
