<?php
 
namespace App\Http\View\Composers;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
 
class CartComposer
{
    protected $users;
   
    public function __construct()
    {
        
    }
 
    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)){
            $view->with('carts', $carts);
            return[];
        }
        

        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'menu_id', 'original_price', 'price_sale', 'image')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
        
        $view->with('product', $products)->with('carts', $carts);
    }
}