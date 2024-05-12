<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function create(){
        return view('admin.menu.add',[
            'title'=> 'Them danh muc moi'
        ]) ;
    }
}