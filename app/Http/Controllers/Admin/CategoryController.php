<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // $data = DB::table('categories')->get();
        $data = Category::all();
        return view('admin.category.category.index', compact('data'));
    }

    public function store( Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

        //query builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        //  DB::table('categories')->insert($data);

         //Eloquent orm
         Category::insert([
            'category_name'=> $request->category_name,
            'category_slug'=> Str::slug($request->category_name, '-')
         ]);
         $notification = array('messege'=> 'insert successfully!', 'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
         DB::table('categories')->where('id',$id)->delete();
        // $category = Category::find($id);
        // $category->delete();
        $notification = array('messege'=> 'category delete', 'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }
    public function edit($id){
        $data = DB::table('categories')->where('id',$id)->first();
        return response()->jason($data);
    }
}
