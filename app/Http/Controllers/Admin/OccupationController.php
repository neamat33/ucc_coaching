<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OccupationService;
use DB;

class OccupationController extends Controller
{
    protected $OccupationService;
    public function __construct(OccupationService $OccupationService)
    {
        $this->OccupationService = $OccupationService;
    }

    public function index()
    {
        $data['occupations'] = $this->OccupationService->get();
        return view('admin.occupation.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->OccupationService->add($data);
            return redirect()->route('occupations.index')->with('success', 'Position Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('occupations.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('occupations')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->OccupationService->update($data, $id);
            return redirect()->route('occupations.index')->with('success', 'Position Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('occupations.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->Service->delete($id);
            return redirect()->route('occupations.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('occupations.index')->with('error', $error_message);
        }
    }
}
