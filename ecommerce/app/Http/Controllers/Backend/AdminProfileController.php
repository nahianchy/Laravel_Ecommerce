<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData =  Admin::findOrFail(4);
        // dd($adminData);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData =  Admin::findOrFail(4);
        // dd($adminData);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileStore(Request $request)
    {
        $data = Admin::find(4);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file =  $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        // password_confirmation
        $hashedPassword = Admin::find(4)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(4);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
