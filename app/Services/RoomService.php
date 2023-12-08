<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RoomService
{

    public function get()
    {
        return DB::table('academic_room as ar')
        ->select('ar.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id_branch','ar.branch_id')
        ->where('ar.status_id',1);
        
            
    }
    public function add($data){
        DB::table('academic_room')->insert([
            'room_name'=>$data['room_name'],
            'branch_id'=>$data['branch_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_room')->where('id_room', $id)->update([
            'room_name'=>$data['room_name'],
            'branch_id'=>$data['branch_id'],
        ]);
        
    }
    public function delete($id){
        DB::table('academic_room')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
