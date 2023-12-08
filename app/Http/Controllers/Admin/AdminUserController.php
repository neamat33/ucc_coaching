<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Services\BranchService;
use DB;

class AdminUserController extends Controller
{
    protected $RoomService;
    public function __construct(RoomService $RoomService)
    {
        $this->RoomService = $RoomService;
    }

    public function index()
    {
        $rooms = $this->RoomService->get();
        $branch = (new BranchService)->get();
        if(session('role_id')==1){ 
            $data['rooms'] = $rooms->get();
            $data['branch'] = $branch->get();
        }else{
            $data['rooms'] = $rooms->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('branch_id',session('branch_id'))->get();
        }
        
        return view('admin.room.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->RoomService->add($data);
            return redirect()->route('rooms.index')->with('success', 'room Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('rooms.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_room')->where('id_room', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->RoomService->update($data, $id);
            return redirect()->route('rooms.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('rooms.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->RoomService->delete($id);
            return redirect()->route('rooms.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('rooms.index')->with('error', $error_message);
        }
    }
}
