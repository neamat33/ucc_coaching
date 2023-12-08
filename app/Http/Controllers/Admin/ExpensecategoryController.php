<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ExpensecategoryController extends Controller
{

    public function index()
    {
       $data["add"] = true;
       $data["expense_category"] = ExpenseCategory::all();
       return view('admin.exp_category.index',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
        ]);
        $self = new ExpenseCategory;
        $self->name=$request->name;
        $self->save();
        Toastr::success('Added Successfully!', 'Success');
        return back();
    }
    public function edit($id)
    {
       $data["edit"] = true;
       $data["expense_category"] = ExpenseCategory::all();
       $data["single"] = ExpenseCategory::findOrFail(decrypt($id));
       return view('admin.exp_category.index',$data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:250',
        ]);
        $self = ExpenseCategory::findOrFail(decrypt($id));
        $self->name=$request->name;
        $self->save();
        Toastr::success('Added Successfully!', 'Success');
        return redirect()->route('expense_category.index');
    }
    public function destroy($id)
    {
        $gallery = ExpenseCategory:: findOrFail(decrypt($id));
        $gallery->delete();
        Toastr::success('Delete Successfully!', 'Success');
        return back();
    }
}
