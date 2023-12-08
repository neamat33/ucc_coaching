<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SectionService;
use App\Services\BranchService;
use DB;

class SectionController extends Controller
{
    protected $SectionService;
    public function __construct(SectionService $SectionService)
    {
        $this->SectionService = $SectionService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $section = $this->SectionService->get();

        if(session('role_id')==1){ 
            $data['section'] = $section->get();
            $data['branch'] = $branch->get();
        }else{
            $data['section'] = $section->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
        }
        return view('admin.section.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->SectionService->add($data);
            return redirect()->route('sections.index')->with('success', 'room Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_section')->where('id_section', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->SectionService->update($data, $id);
            return redirect()->route('sections.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->SectionService->delete($id);
            return redirect()->route('sections.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }
}
