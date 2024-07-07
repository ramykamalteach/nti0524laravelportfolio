<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    //
    public function registerMember(Request $request) {
        $request->validate([
            'fullName' => 'required',
            'loginName' => 'required',
            'password' => 'required',
        ]);

        $member = new Member();
        $member->fullName = $request->fullName;
        $member->loginName = $request->loginName;
        $member->password = Hash::make($request->password);

        $member->save();

        return view('dashboard.registerMember.index');
    }

    public function verifyLogin(Request $request) {
        $request->validate([
            'loginName' => 'required',
            'password' => 'required',
        ]);

        $loginUser = Member::where("loginName", "=", $request->loginName)->first();

        if($loginUser){
            if (Hash::check($request->password, $loginUser->password)) {

                Session::put('userId', $loginUser->id);
                Session::put('fullName', $loginUser->fullName);

                return redirect()->route('messages.index');
            }
            else {
                return redirect()->back()->with("failed", "Login Failed");
            }
        }
        else {
            return redirect()->back()->with("failed", "Login Failed");
        }

    }

    public function logout() {
        Session::flush();

        return redirect()->route('login')->with("logout", "You logged out, Good bye !!!");
    }
}
