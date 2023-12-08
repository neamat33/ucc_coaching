<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class IncomeCategoryController extends Controller
{

    public function index()
    {
       $data["add"] = true;
       $data["income_category"] = IncomeCategory::all();
       return view('admin.income_category.index',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
        ]);
        $self = new IncomeCategory;
        $self->name=$request->name;
        $self->save();
        Toastr::success('Added Successfully!', 'Success');
        return back();
    }
    public function edit($id)
    {
       $data["edit"] = true;
       $data["income_category"] = IncomeCategory::all();
       $data["single"] = IncomeCategory::findOrFail(decrypt($id));
       return view('admin.income_category.index',$data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:250',
        ]);
        $self = IncomeCategory::findOrFail(decrypt($id));
        $self->name=$request->name;
        $self->save();
        Toastr::success('Added Successfully!', 'Success');
        return redirect()->route('income_category.index');
    }
    public function destroy($id)
    {
        $gallery = IncomeCategory:: findOrFail(decrypt($id));
        $gallery->delete();
        Toastr::success('Delete Successfully!', 'Success');
        return back();
    }
}
