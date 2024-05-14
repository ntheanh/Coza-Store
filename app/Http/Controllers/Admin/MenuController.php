<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;


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

}
