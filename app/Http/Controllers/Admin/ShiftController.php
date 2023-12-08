<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ShiftService;
use App\Services\BranchService;
use DB;

class ShiftController extends Controller
{
    protected $ShiftService;
    public function __construct(ShiftService $ShiftService)
    {
        $this->ShiftService = $ShiftService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $shift = $this->ShiftService->get();

        if(session('role_id')==1){ 
            $data['shift'] = $shift->get();
            $data['branch'] = $branch->get();
        }else{
            $data['shift'] = $shift->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
        }
        return view('admin.shift.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->ShiftService->add($data);
            return redirect()->route('shifts.index')->with('success', 'room Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('shifts.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_shift')->where('id_shift', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->ShiftService->update($data, $id);
            return redirect()->route('shifts.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('shifts.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->ShiftService->delete($id);
            return redirect()->route('shifts.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('shifts.index')->with('error', $error_message);
        }
    }
}
