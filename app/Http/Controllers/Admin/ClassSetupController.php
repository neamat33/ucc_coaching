<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ClassSetupService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\SectionService;
use DB;

class ClassSetupController extends Controller
{
    protected $ClassSetupService;
    public function __construct(ClassSetupService $ClassSetupService)
    {
        $this->ClassSetupService = $ClassSetupService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $section = (new SectionService)->get();
        $class = (new ClassService)->get();
        $class_setup = $this->ClassSetupService->get();

        if (session('role_id') == 1) {
            $data['class_setup'] = $class_setup->get();
            $data['branch'] = $branch->get();
            $data['sections'] = $section->get();
            $data['classes'] = $class->get();
        } else {
            $data['class_setup'] = $class_setup->where('branch_id', session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch', session('branch_id'))->get();
            $data['sections'] = $section->where('id_section', session('branch_id'))->get();
            $data['classes'] = $class->where('id_class', session('branch_id'))->get();
        }
        return view('admin.class_setup.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $sections = $data['section_id'];
        try {
            foreach ($sections as $section) {
                $this->ClassSetupService->add($data, $section);
            }

            return redirect()->route('class_settings.index')->with('success', 'Class Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('class_settings.index')->with('error', $error_message);
        }
    }

    public function edit($branch_id, $id)
    {

        $section = (new SectionService)->get();
        $data['single'] = $this->ClassSetupService->edit($branch_id, $id);

        if (session('role_id') == 1) {
            $data['sections'] = $section->get();
        } else {
            $data['sections'] = $section->where('branch_id', session('branch_id'))->get();
        }
        return view('admin.class_setup.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $sections = $data['section_id'];
        $branch_id = $data['branch_id'];
        $class_id = $data['class_id'];
        try {
            $update = $this->ClassSetupService->update($branch_id, $class_id);
            if ($update) {
                foreach ($sections as $section) {
                    $this->ClassSetupService->add($data, $section);
                }
            }
            return redirect()->route('class_settings.index')->with('success', 'Class Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('class_settings.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->ClassSetupService->delete($id);
            return redirect()->route('class_settings.index')->with('success', 'Deleted successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('class_settings.index')->with('error', $error_message);
        }
    }
}
