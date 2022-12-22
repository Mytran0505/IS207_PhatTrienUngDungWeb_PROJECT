<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title' => 'Đăng nhập hệ thống SportswearShop'
        ]);
    }

    public function store(Request $request){
        $this -> validate($request, [
            'email' => 'required|email:filter|max:255',
            'password' => 'required|max:255'
        ]);
        $customer = Customer::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
        if($customer){
            FacadesSession::put('email', $customer->email);
            FacadesSession::put('name', $customer->name);
            FacadesSession::put('phone', $customer->phone);
            FacadesSession::put('customerId', $customer->id);
            return redirect('/');
        }
        else{
            FacadesSession::flash('error', 'Đăng nhập sai, vui lòng thử lại');
            return redirect()->back();
        }
    }

    public function registerAuth(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required',
            'password' => 'required|min:6'
        ], [
            'name' => 'Vui lòng nhập họ và tên',
            'phone' => 'Vui lòng nhập sđt',
            'email'=> 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại'
        ]);

        $data = $request -> all();

        Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone']
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile($customerId) {
        $customer = Customer::where('id', $customerId)->get();

        return view('profile', [
            'title' => 'Thông tin tài khoản',
            'customer' => $customer
        ]);
    }
}
