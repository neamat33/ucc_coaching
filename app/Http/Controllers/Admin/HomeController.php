<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    use UploadAble;

    public function getDashboard()
    {
        $user = Auth::user();
        if($user){
            $branch_id = $user['branch_id'];
            $role_id = $user['role_id'];
            session()->put('user', $user);
            session()->put('branch_id', $branch_id);
            session()->put('role_id', $role_id);
        }
       
        $data["expense"] = DB::select("SELECT sum(amount) as total from expenses");
        $data["income"] = DB::select("SELECT sum(amount) as total from incomes");
        return view('admin.dashboard.dashboard',$data);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    //admin profile show
    public function view_profile()
    {
        $user = Auth::user();
        return view('admin.dashboard.profile', compact('user'));
    }

    public function update_general(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:32|regex:/^[a-zA-Z\s]+$/',
            'image' => 'image|mimes:jpg,png,jpeg|max:512',
            'phone_number' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
        ]);

        $admin = Admin::findOrFail($id);
        if ($request->hasFile('image')) {
            $filename = $this->uploadOne($request->image, 300, 300, config('imagepath.profile'));
            $this->deleteOne(config('imagepath.profile'), $admin->image);
             $admin->update(['image' => $filename]);
        }
        $admin->update($request->except(['token', 'image']));
        $admin->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        Toastr::success('Information Changed Successfully!', 'Success');
        return back();
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|min:8|same:new_password',
        ]);
        $admin = Admin::find($id);
        if (!\Hash::check($request->password, $admin->password)) {
            Toastr::error("Old password doesn't match !", 'Error');
            return back();
        } else {
            $admin = Admin::find($id);
            $admin->password = bcrypt($request->new_password);
            $admin->save();
            Toastr::success('Password changed Successfully!', 'Success');
            return redirect()->back();
        }
    }
}
