<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
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
        $category = Category::all();        
        return view('admin.category.subcategory.index',compact('data','category'));

    }

    public function store( Request $request){
        $validated = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:55',
        ]);

        //query builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        //  DB::table('categories')->insert($data);

         //Eloquent orm
         Subcategory::insert([
           
            'subcategory_name'=> $request->subcategory_name,
            'subcategory_slug'=> Str::slug($request->subcategory_name, '-'),
            'category_id'=> $request->category_id,
         ]);
         $notification = array('messege'=> 'insert successfully!', 'alert-type'=> 'success');
        return redirect()->back()->with($notification);
         }

        public function destroy($id)
        {
            DB::table('subcategories')->where('id',$id)->delete();
           // $category = Category::find($id);
           // $category->delete();
           $notification = array('messege'=> 'category delete', 'alert-type'=> 'success');
           return redirect()->back()->with($notification);
         }


       public function edit($id)
       {

        $data = Subcategory::find($id);
        $category = Category::all();
        return view('admin.category.subcategory.edit',compact('data','category'));

       }

      //update method
    public function update(Request $request)
    {
       //Eloquent ORM
       $subcategory=Subcategory::where('id',$request->id)->first();
       $subcategory->update([
       		'category_id'=> $request->category_id,
    		'subcategory_name'=> $request->subcategory_name,
    		'subcat_slug'=> Str::slug($request->subcategory_name, '-')
       ]);

       //QueryBuilder

    	// $data=array();
    	// $data['category_id']=$request->category_id;
    	// $data['subcategory_name']=$request->subcategory_name;
    	// $data['subcat_slug']=Str::slug($request->subcategory_name, '-');
    	// DB::table('subcategories')->where('id',$request->id)->update($data);

       $notification=array('messege' => 'Subategory Updated!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }





}
