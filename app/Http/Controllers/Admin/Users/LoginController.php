<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Termwind\render;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function store(Request $request){
        $this -> validate($request, [
            'email' => 'required|email:filter|max:255',
            'password' => 'required|max:255'
        ]);

        if(Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request -> input('password')
        ], $request ->input('remember'))) {
            $user = User::where('email', $request -> input('email'))->first();
            FacadesSession::put('email', $user->email);
            FacadesSession::put('name', $user->name);
            FacadesSession::put('id', $user->id);
            return redirect()->route('admin');
        }

        FacadesSession::flash('error', 'Đăng nhập sai, xin vui lòng thử lại');
        return redirect()->back();
    }
    public function register(){
        return view('admin.users.register', [
            'title' => 'Trang đăng ký'
        ]);
    }
    public function registerAuth(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ], [
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);

        $data = $request -> all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công, mời đăng nhập');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin');
    }
}
