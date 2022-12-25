<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper {
    public static function menu($menus, $parent_id = 0, $char =''){
        $html = '';

        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>'. $menu->id .'</td>
                        <td>'. $char . $menu->name .'</td>
                        <td>'. self::active($menu->active) .'</td>
                        <td>'. $menu->updated_at .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>    
                ';

                unset($menu[$key]);

                $html .= self::menu($menus, $menu ->id, $char . '|--');
            }
        }
        return $html;
    }

    public static function active($active = 0) : string {
        return $active == 0 ? '<span class = "btn btn-danger btn-sm"> <i class="fas fa-times"></i> </span>' 
        : '<span class = "btn btn-success btn-sm"> <i class="fas fa-check"></i> </span>';
    }

    public static function activeDate($active = 0, $end_date, $today) : string {
        if($end_date < $today){
            return '<span class = "btn btn-danger btn-sm"> <i class="fas fa-times"></i> </span>';
        }
        // if($end_date >= $today) {
        //     return '<span class = "btn btn-success btn-sm"> <i class="fas fa-check"></i> </span>';
        // }
        return $active == 0 ? '<span class = "btn btn-danger btn-sm"> <i class="fas fa-times"></i> </span>' 
        : '<span class = "btn btn-success btn-sm"> <i class="fas fa-check"></i> </span>';
    }

    public static function menus($menus, $parent_id = 0): string{
        $html = '';
        foreach($menus as $key => $menu){
            if($menu -> parent_id == $parent_id){
                $html .= '
                    <li class = "'.$menu->name.'">
                        <a href = "/danh-muc/'.$menu->id . '-'. Str::slug($menu -> name, '-').'.html">
                            '.$menu->name.'
                        </a>';
                unset($menus[$key]);
                if(self::isChild($menus, $menu->id)){
                    $html.= '<ul class = "sub-menu">';
                    $html.= self::menus($menus, $menu->id);
                    $html.= '</ul>';
                }
                    $html .= '</li>
                ';
            }
        }
        return $html;
    }

    public static function isChild($menus, $id):bool {
        foreach($menus as $menu){
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }

    public static function price($price =0, $priceSale = 0){
        if($priceSale!=0) return number_format($priceSale);
        if($price != 0) return number_format($price);
        return '<a href = "/lien-he.html">Liên hệ</a>';
    }
}