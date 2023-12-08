<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class OccupationService
{
 
    public function get()
    {
        return DB::table('occupations')->where('status_id',1)->get();
            
    }
    public function add($data){
        DB::table('occupations')->insert([
            'name'=>$data['name'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('occupations')->where('id', $id)->update([
            'name'=>$data['name'],
        ]);
        
    }
    public function delete($id){
        DB::table('occupations')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
