<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubjectAssignService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\SubjectService;
use DB;

class SubjectAssignController extends Controller
{
    protected $SubjectAssignService;
    public function __construct(SubjectAssignService $SubjectAssignService)
    {
        $this->SubjectAssignService = $SubjectAssignService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $subject = (new SubjectService)->get();
        $class = (new ClassService)->get();
        $subject_assign = $this->SubjectAssignService->get();

        if(session('role_id')==1){ 
            $data['subject_assign'] = $subject_assign->get();
            $data['branch'] = $branch->get();
            $data['subjects'] = $subject->get();
            $data['classes'] = $class->get();
        }else{
            $data['subject_assign'] = $subject_assign->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
            $data['subjects'] = $subject->where('id_subject',session('branch_id'))->get();
            $data['classes'] = $class->where('id_class',session('branch_id'))->get();
        }
        return view('admin.subject_assign.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $subjects = $data['subject_id'];
        try {
            foreach($subjects as $subject){
                $this->SubjectAssignService->add($data,$subject);
            }
        
            return redirect()->route('subject_assign.index')->with('success', 'Class Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subject_assign.index')->with('error', $error_message);
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
            $this->SubjectAssignService->update($data, $id);
            return redirect()->route('subject_assign.index')->with('success', 'Class Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subject_assign.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->SubjectAssignService->delete($id);
            return redirect()->route('subject_assign.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subject_assign.index')->with('error', $error_message);
        }
    }
}
