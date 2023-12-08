<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\IncomeCategory;
use App\Models\Income;
use App\Models\TransactionLog;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use PDF;
class IncomeController extends Controller
{
    use UploadAble;

    public function index()
    {
       $data["income"] = Income::with('category')->get();
       return view('admin.income.index',$data);
    }
    public function create(){
        $data['category'] = IncomeCategory::all();
        return view('admin.income.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'date' => 'required',

        ]);
        // add log
        $log = new TransactionLog;
        $log->amount=$request->amount;
        $log->transaction_type="income";
        $log->save();
        // add income
        $income = new Income;
        $income->log_id=$log->id;
        $income->category_id=$request->category_id;
        $income->title=$request->title;
        $income->amount=$request->amount;
        $income->reference_no=$request->reference_no;
        $income->date=$request->date;
        $income->note=$request->note;
        $income->save();
        Toastr::success('Added Successfully!', 'Success');
        return back();
    }
    public function edit($id)
    {
       $data['single'] = Income::findOrfail(decrypt($id));
       $data['category'] = IncomeCategory::all();
       return view('admin.income.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $log = TransactionLog::find($request->log_id);
        $log->amount=$request->amount;
        $log->transaction_type="income";
        $log->update();
        // add income
        $income = Income:: findOrFail(decrypt($id));
        $income->category_id=$request->category_id;
        $income->title=$request->title;
        $income->amount=$request->amount;
        $income->reference_no=$request->reference_no;
        $income->date=$request->date;
        $income->note=$request->note;
        $income->save();
        Toastr::success('Update Successfully!', 'Success');
        return redirect()->route('income.index');return back();
    }
    public function destroy($id)
    {
        $income = Income:: findOrFail(decrypt($id));
        $income->delete();
        Toastr::success('Delete Successfully!', 'Success');
        return back();
    }
    public function report(){
        $data['category'] = IncomeCategory::all();
        return view('admin.income.report',$data);
    }
    public function getreport(Request $request){
        $c_id = $request->category_id;
        $from = date('Y-m-d',strtotime($request->from));
        $to =  date('Y-m-d',strtotime($request->to));


        if($c_id>0){
            $data['reports'] = DB::table('incomes')
            ->join('income_categories as ec', 'ec.id', '=', 'incomes.category_id')
            ->where('incomes.category_id',$c_id)
            ->whereBetween('incomes.date', [$from, $to])
            ->select('incomes.id','incomes.title','ec.name as category','incomes.amount','incomes.date','incomes.reference_no')
            ->get();
        }else{
            $data['reports'] = DB::table('incomes')
            ->join('income_categories as ec', 'ec.id', '=', 'incomes.category_id')
            ->whereBetween('incomes.date', [$from, $to])
            ->select('incomes.id','incomes.title','ec.name as category','incomes.amount','incomes.date','incomes.reference_no')
            ->get();
        }
        $pdf = PDF::loadView('admin.income.report_pdf', $data);
        $file_name = 'expense-report '.date('d-m-y').'.'.'pdf';
        return $pdf->stream($file_name);
    }
    
    public function print($id){
        $data["single"] = DB::table('incomes as e')
            ->join('income_categories as ec', 'ec.id', '=', 'e.category_id')
            ->select('e.*','ec.name as category')
            ->where('e.id',decrypt($id))
            ->first();
        $pdf = PDF::loadView('admin.income.invoice',$data);
        $pdf->setPaper('A4');
        $file_name = 'expense-invoice '.date('d-m-y').'.'.'pdf';
        return $pdf->stream($file_name);
    }

}
