<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image',"max:2048"],
        ]);

        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $image_name = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'),$image_name);
            $path = '/uploads/'.$image_name;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success("updated");
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            "current_password" => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back();
    }
}