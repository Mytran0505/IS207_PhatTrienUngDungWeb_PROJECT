<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;
use App\Models\Cart;
use GuzzleHttp\Psr7\Request as Psr7Request;

class CartController extends Controller
{
    protected $cartService;
    
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result ===false){
            return redirect()->back();
        }

        return redirect()->back();
        
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
        // Session::forget('carts');
    }

    public function update(Request $request){
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id){
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function removeInHome($id){
        $this->cartService->removeInHome($id);
        return redirect()->back();
    }

    

    public function addCart(Request $request){
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
