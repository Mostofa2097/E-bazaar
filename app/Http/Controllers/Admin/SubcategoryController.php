<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(){
        $data = DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')
                ->select('subcategories.*','categories.category_name')->get();
        return view('admin.category.subcategory.index',compact('data'));

    }





}
