<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BranchService;
use DB;

class BranchController extends Controller
{
    protected $BranchService;
    public function __construct(BranchService $BranchService)
    {
        $this->BranchService = $BranchService;
    }

    public function index()
    {
        $branch = $this->BranchService->get();
        $data['branch'] = $branch->get(); 

        return view('admin.branch.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->BranchService->add($data);
            return redirect()->route('branch.index')->with('success', 'room Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_branch')->where('id_branch', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->BranchService->update($data, $id);
            return redirect()->route('branch.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->BranchService->delete($id);
            return redirect()->route('branch.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }
}
