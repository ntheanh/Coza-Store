<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title'=> 'Them danh muc moi',
            'menus'=> $this->menuService->getParent()
        ]) ;
    }

    public function store(CreateFormRequest $request){

        $this->menuService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.menu.list',[
            'title'=> 'Danh sach danh muc moi nhat',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu){
        return view('admin.menu.edit',[
            'title'=> 'Chinh sua danh muc: ' .$menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){
        $this->menuService->update($request,$menu);

        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request){
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error'=> false,
                'message'=> 'Xoa thanh cong dan muc'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

}