<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     * */
    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $path = '/uploads/';
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path($path . $filename));
            $request->user()->avatar = $filename;
            $request->user()->save();
        }

        return redirect()->route('user_profile')->with(['success' => 'hello']);
    }
}
