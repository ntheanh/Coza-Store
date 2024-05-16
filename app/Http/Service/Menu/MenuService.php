<?php
namespace App\Http\Service\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAll(){
        return Menu::orderByDesc('id')->paginate(20);
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

    public function update($request, $menu){
        $menu->fill($request->input());
        $menu->save();

        Session::flash('success','Cap nhat danh muc thanh cong');//Not work
        return true;
    }

    public function destroy($request){
        $id= (int) $request->input('id');
        $menu = Menu::where('id',$id)->first();

        if ($menu) {
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }

        return false;
    }


}