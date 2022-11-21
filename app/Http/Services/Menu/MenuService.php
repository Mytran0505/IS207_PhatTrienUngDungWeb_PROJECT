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
        return Menu::orderbyDesc('menu_id')->paginate(20);
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
        $id = (int) $request->input('menu_id');
        $menu = Menu::where('menu_id', $request->input('menu_id'))->first();
        if($menu) {
            return Menu::where('menu_id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
}