<?php
namespace App\Http\Controllers;
use Mail;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session as FacadesSession;

class AjaxLoginController extends Controller
{
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email:filter|max:255',
            'password' => 'required|max:255'
            ],[
                'email.required' => 'Địa chỉ email không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'email.email' => 'Địa chỉ email không đúng định dạng',
                'email.exists' => 'khong ton tai'
        ]);
        if ($validator->passes()) {
        $customer = Customer::where('email', $req->email)
        ->where('password', $req->password)->first();
        if($customer){
            FacadesSession::put('customerId', $customer->id);
            FacadesSession::put('email', $customer->email);
            FacadesSession::put('name', $customer->name);
            return redirect()->back();
        }
        else{
            FacadesSession::flash('error', 'Đăng nhập sai, vui lòng thử lại');
            return redirect()->back();
        } }
        else{
            return response()->json(['error'=>$validator->errors()->all()]);
        } 
    }  
        // $validator = Validator::make($req->all(), [
        //     'email' => 'required|email:filter|max:255',
        //     'password' => 'required|max:255']
            // ,[
            //     'email.requird' => 'Dia chi email khong de trong',
            //     'password.requird' => 'Mat khau khong de trong',

            //     'email.email' => 'Dia chi email khong dung dinh dang',
            //     'email.exists' => 'Dia chi email khong ton tai trong he thong'
        // ]);
        //     if ($validator->passes()) {
        //     $data = $req->only('email', 'password');
        //     $check_login = Auth::guard('cus')->attempt($data);
        //     if ($check_login){
        //         if (Auth::guard('cus')->user()->status == 0){
        //             Auth::guard('cus')->logout();
        //             return response()->json(['error'=>['Tai khoan chua xac thuc']]);
        //         }
            
        //         return response()->json(['data'=>Auth::guard('cus')->user()]);
        //     }
        // }
        // return response()->json(['error'=>$validator->errors()->all()]);
    
    public function comment($blog_id, Request $req){
            $CustomerId= Session::get('customerId');

            $validator = Validator::make($req->all(), [
            'content' => 'required',
            ],[
                'content.required' => 'Nội dung bình luận không được để trống',
            ]);
            if ($validator->passes()) {
                $data =[
                    'customer_id' => $CustomerId,
                    'blog_id'=> $blog_id,
                    'content' => $req->content,
                    'reply_id' => $req->reply_id ? $req->reply_id : 0
                ];
                if($comment = Comment::create($data)){
                    $comments = Comment::where(['blog_id'=> $blog_id, 'reply_id' => 0])->orderBy('id', 'DESC')->get();
                    return view('list-comment', compact('comments'));
                }}
                else{
                    return response()->json(['error'=>$validator->errors()->first()]);
                }
    }
    

}
