<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubjectService;
use App\Services\BranchService;
use DB;

class SubjectController extends Controller
{
    protected $SubjectService;
    public function __construct(SubjectService $SubjectService)
    {
        $this->SubjectService = $SubjectService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $subject = $this->SubjectService->get();

        if(session('role_id')==1){ 
            $data['subject'] = $subject->get();
            $data['branch'] = $branch->get();
        }else{
            $data['subject'] = $subject->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
        }

        return view('admin.subject.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->SubjectService->add($data);
            return redirect()->route('subjects.index')->with('success', 'room Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subjects.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_subject')->where('id_subject', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->SubjectService->update($data, $id);
            return redirect()->route('subjects.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subjects.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->SubjectService->delete($id);
            return redirect()->route('subjects.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('subjects.index')->with('error', $error_message);
        }
    }
}
