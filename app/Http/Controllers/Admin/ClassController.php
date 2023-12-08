<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ClassService;
use App\Services\BranchService;
use DB;

class ClassController extends Controller
{
    protected $ClassService;
    public function __construct(ClassService $ClassService)
    {
        $this->ClassService = $ClassService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $class = $this->ClassService->get();

        if(session('role_id')==1){ 
            $data['classes'] = $class->get();
            $data['branch'] = $branch->get();
        }else{
            $data['classes'] = $class->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
        }
        return view('admin.class.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->ClassService->add($data);
            return redirect()->route('classes.index')->with('success', 'Class Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_class')->where('id_class', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->ClassService->update($data, $id);
            return redirect()->route('classes.index')->with('success', 'Class Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->ClassService->delete($id);
            return redirect()->route('classes.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }
}
