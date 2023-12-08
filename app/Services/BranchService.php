<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BranchService
{

    public function get()
    {
        return DB::table('academic_branch')->where('status_id',1);           
    }
    public function add($data){
        DB::table('academic_branch')->insert([
            'branch_name'=>$data['branch_name'],
            'branch_address'=>$data['branch_address'], 
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_branch')->where('id_branch', $id)->update([
            'branch_name'=>$data['branch_name'],
            'branch_address'=>$data['branch_address'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_branch')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
