<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\TransactionLog;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use PDF;
class ExpenseController extends Controller
{
    use UploadAble;

    public function index()
    {
       $data["expense"] = Expense::with('category')->get();
       return view('admin.expense.index',$data);
    }
    public function create(){
        $data['category'] = ExpenseCategory::all();
        return view('admin.expense.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'date' => 'required',

        ]);
        $log = new TransactionLog;
        $log->amount=$request->amount;
        $log->transaction_type="expense";
        $log->date=$request->date;
        $log->save();
        // add Expense
        $expense = new Expense;
        $expense->log_id=$log->id;
        $expense->category_id=$request->category_id;
        $expense->title=$request->title;
        $expense->amount=$request->amount;
        $expense->reference_no=$request->reference_no;
        $expense->date=$request->date;
        $expense->note=$request->note;
        $expense->save();
        Toastr::success('Added Successfully!', 'Success');
        return back();
    }
    public function edit($id)
    {
        $data['single'] = Expense::findOrfail(decrypt($id));
        $data['category'] = ExpenseCategory::all();
       return view('admin.expense.edit',$data);
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
        $log->transaction_type="expense";
        $log->date=$request->date;
        $log->update();
        // add Expense
        $expense = Expense:: findOrFail(decrypt($id));
        $expense->category_id=$request->category_id;
        $expense->title=$request->title;
        $expense->amount=$request->amount;
        $expense->reference_no=$request->reference_no;
        $expense->date=$request->date;
        $expense->note=$request->note;
        $expense->save();
        Toastr::success('Update Successfully!', 'Success');
        return redirect()->route('expense.index');return back();
    }
    public function destroy($id)
    {
        $expense = Expense:: findOrFail(decrypt($id));
        $expense->delete();
        Toastr::success('Delete Successfully!', 'Success');
        return back();
    }
    public function report(){
        $data['category'] = ExpenseCategory::all();
        return view('admin.expense.report',$data);
    }
    public function getreport(Request $request){
        $c_id = $request->category_id;
        $from = date('Y-m-d',strtotime($request->from));
        $to =  date('Y-m-d',strtotime($request->to));


        if($c_id>0){
            $data['reports'] = DB::table('expenses')
            ->join('expense_categories as ec', 'ec.id', '=', 'expenses.category_id')
            ->where('expenses.category_id',$c_id)
            ->whereBetween('expenses.date', [$from, $to])
            ->select('expenses.id','expenses.title','ec.name as category','expenses.amount','expenses.date','expenses.reference_no')
            ->get();
        }else{
            $data['reports'] = DB::table('expenses')
            ->join('expense_categories as ec', 'ec.id', '=', 'expenses.category_id')
            ->whereBetween('expenses.date', [$from, $to])
            ->select('expenses.id','expenses.title','ec.name as category','expenses.amount','expenses.date','expenses.reference_no')
            ->get();
        }
        $pdf = PDF::loadView('admin.expense.report_pdf', $data);
        $file_name = 'expense-report '.date('d-m-y').'.'.'pdf';
        return $pdf->stream($file_name);
    }
    public function print($id){
        $data["single"] = DB::table('expenses as e')
            ->join('expense_categories as ec', 'ec.id', '=', 'e.category_id')
            ->select('e.*','ec.name as category')
            ->where('e.id',decrypt($id))
            ->first();
        $pdf = PDF::loadView('admin.expense.invoice',$data);
        $pdf->setPaper('A4');
        $file_name = 'expense-invoice '.date('d-m-y').'.'.'pdf';
        return $pdf->stream($file_name);
    }

    public function profit_loss(){
        return view('admin.expense.profit_loss');
    }
    public function profit_loss_report(Request $request){
        $from = date('Y-m-d',strtotime($request->from));
        $to =  date('Y-m-d',strtotime($request->to));
        $data["reports"] = TransactionLog::whereBetween('date', [$from, $to])->get();
        $pdf = PDF::loadView('admin.expense.profit_loss_pdf',$data);
        $pdf->setPaper('A4');
        $file_name = 'expense-invoice '.date('d-m-y').'.'.'pdf';
        return $pdf->stream($file_name);
    }

}
