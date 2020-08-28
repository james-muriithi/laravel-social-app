<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.profile');
    }

    /**
     * @param Request $request
     * @return Response
     * */
    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $path = '/uploads/';
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path($path . $filename));
            if ($request->user()->avatar !=='avatar.png'){
                $old_avatar = $path . $request->user()->avatar;
                if (File::exists(public_path($old_avatar))){
                    File::delete(public_path($old_avatar));
                }
            }
            $request->user()->avatar = $filename;
            $request->user()->save();
        }

        return redirect()->route('user_profile')
            ->with(['success' => 'Your image was updated successfully']);
    }

    /**
     * @param Request $request
     * @return Response
     * */
    public function updateInfo(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        return back()->with(['success'=> 'Your details were successfully updated']);
    }

    /**
     * @param Request $request
     * @return Response
     * */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required|confirmed|min:8',
            'old_password' => 'required'
        ]);

        if (!Hash::check($request->all()['old_password'], $user->password)){
            return back()->with(['error'=>'You have entered wrong password']);
        }

        $user->password = Hash::make($request->all()['password']);
        $user->save();
        return back()->with(['success'=> 'Your password was successfully updated']);
    }
}
