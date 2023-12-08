<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Services\MemberService;
use App\Services\OccupationService;
use App\Services\DesignationService;
class MemberController extends Controller
{
    protected $MemberService;

    public function __construct(MemberService $MemberService){
        $this->MemberService = $MemberService;
    }
    
    public function index(){
       $data['members'] = $this->MemberService->get();
       return view('admin.member.list', $data);
    }

    public function create(){
        $designation = new DesignationService;
        $occupation = new OccupationService;
        $data['designations'] = $designation->get();
        $data['occupations'] = $occupation->get();
        $data['divisions'] = $this->MemberService->getDivision();

        return view('admin.member.create',$data);
    }

    public function store(Request $request){
        $data = $request->all();
       
        try {
            $this->MemberService->add($data);
            return redirect()->route('members.index')->with('success', 'user update successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('members.create')->with('error', $error_message);
        }
    }
    public function show(){
       return $id = $_GET['id'];
    }
    public function getUnions(){
       $upazila_id =  $_GET['upazila_id'];
       return $this->MemberService->getUnions($upazila_id);
    }
    public function getDistrict(){
       $division_id =  $_GET['division_id'];
       return $this->MemberService->getDistrict($division_id);
    }
    public function getUpazila(){
       $district_id =  $_GET['district_id'];
       return $this->MemberService->getUpazila($district_id);
    }
}
