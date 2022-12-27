<?php


namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuService {

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->get();
    }

    public function create($request){
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'active' => (string) $request->input('active')
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu) :bool {
        if($request->input('parent_id' != $menu->id)) {
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->fill($request->input());
        $menu->save();

        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request) {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function show(){
        return Menu::select('name', 'id', 'image')
        ->where('parent_id',0)
        ->orderBy('id')
        ->get();
    }

    public function getId($id){
        return Menu::where('id',$id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu, $request){
        $query = $menu->products()
            ->select('id', 'name', 'menu_id', 'price_sale','image')
            ->where('active',1);

        if ($request->input('price_sale')){
            $query->orderBy('price_sale', $request->input('price_sale'));
        }
        return $query 
            ->orderByDesc('id')    
            ->paginate(12)
            ->withQueryString();
    }
}