<?php
namespace App\Http\Service\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function create($request){
        try {
            Menu::create([
                'name'=> (string) $request->input('name'),
                'parent_id'=> (string) $request->input('parent_id'),
                'description'=> (string) $request->input('description'),
                'content'=> (string) $request->input('content'),
                'active'=> (string) $request->input('active'),
            ]);

            Session::flash('success','Tao danh muc thanh cong');//Not work
            // $request->session()->flash('success', 'Tao danh muc thanh cong');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
}
