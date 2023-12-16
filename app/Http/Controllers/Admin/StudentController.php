<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\SectionService;
use App\Services\ShiftService;
use DB;

class StudentController extends Controller
{
    protected $StudentService;
    public function __construct(StudentService $StudentService)
    {
        $this->StudentService = $StudentService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $class = $this->StudentService->get();

        if(session('role_id')==1){ 
            $data['classes'] = $class->get();

        }else{
            $data['classes'] = $class->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id_branch',session('branch_id'))->get();
        }
        return view('admin.class.list', $data);
    }

    public function create()
    {

        $branch = (new BranchService)->get();
        $class = (new ClassService)->get();
        $section = (new SectionService)->get();
        $shift = (new ShiftService)->get();

        if(session('role_id')==1){ 
            $data['branches'] = $branch->get();
            $data['classes'] = $class->get();
            $data['sections'] = $section->get();
            $data['shifts'] = $shift->get();
        }else{
            $data['branches'] = $branch->where('id_branch',session('branch_id'))->get();
            $data['classes'] = $class->where('branch_id',session('branch_id'))->get();
            $data['sections'] = $section->where('branch_id',session('branch_id'))->get();
            $data['shifts'] = $shift->where('branch_id',session('branch_id'))->get();
        }
        return view('admin.student.create', $data);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'student_name' => 'required|max:128',
            'mobile' => "required|numeric|min:11|unique:student_info",
            'dob' => 'required',
        ]);
        
       // try {
            $data = $request->all();
            $id = $this->StudentService->add($data);

            if($id){
                // save student_class_assignment
                $class_assignment = $this->StudentService->classAssignment($data,$id);
                // save image
                
                if (!empty($img = $request->file('img'))) {
                    $name = $img->getClientOriginalName();
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    $fileName = 'img-' . rand(1111111, 9999999) . '.' . $ext;
                    $folder = "student/";
                    $path = $folder . $fileName;
                    $img->move(public_path($folder), $fileName);
                    DB::table("student_info")->where("id_student", $id)->update(['img' => $path]);
                }
            }
            
        return redirect()->back()->with('success', 'Class Created Successfully');
        // } catch (\Exception $e) {
        //     $error_message = $e->getMessage();
        //     return redirect()->route('classes.index')->with('error', $error_message);
        // }
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
            $this->StudentService->update($data, $id);
            return redirect()->route('classes.index')->with('success', 'Class Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->StudentService->delete($id);
            return redirect()->route('classes.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function get_section(){
       $class_id = $_GET['class_id'];
       $branch_id = $_GET['branch_id'];

      return $this->StudentService->getSection($branch_id,$class_id);
       
    }
}
