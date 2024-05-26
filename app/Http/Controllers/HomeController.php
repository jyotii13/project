<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getAddProduct(){
        return view('admin.product.add');
    }
    public function getAddCategory(){
        return view('admin.category.add');
    }

    public function getManageCategory(){
        $jhola =[
            'categories' => category::all(),
            // 'onlyshowcategories' => Category::where('status', 'active')->get(),
            // 'users' => User::all()
        ];
        // dd($jhola['onlyshowcategories']);
        return view('admin.category.manage', $jhola);
    }

    public function getManageProduct(){
        $jhola =[
            'products' => product::all(),
            // 'onlyshowcategories' => Category::where('status', 'active')->get(),
            // 'users' => User::all()
        ];
        // dd($jhola['onlyshowcategories']);
        return view('admin.product.manage', $jhola);
    }


    public function postAddCategory(Request $request){
        // photo lai photo veriable ma store gare ko
        $photo = $request->file('photo');
       
            // photo ko extension name taneko
            $extension = $photo->getClientOriginalExtension();

            //unique time ra photo extension milayara photo ko nam banaya ko
            $photoname = md5(time()).'.'.$extension;

            // photo lai tehi name ma server ma move gare ko
            $photo->move('uploads/category/', $photoname);
           
            
        $category = New category;
        $category->name = $request->name;
        $category->detail = $request->detail;
        $category->status = $request->status;
    
            $category->photo = $photoname;
        
        $category->save();
        return redirect()->back()->with('status', 'Category added successfully');
    }

    public function postAddProduct(Request $request){
        // photo lai photo veriable ma store gare ko
        $photo = $request->file('photo');
       
            // photo ko extension name taneko
            $extension = $photo->getClientOriginalExtension();

            //unique time ra photo extension milayara photo ko nam banaya ko
            $photoname = md5(time()).'.'.$extension;

            // photo lai tehi name ma server ma move gare ko
            $photo->move('uploads/product/', $photoname);
           
            
        $product = New product;
        $product->name = $request->name;
        $product->category_id= $request->category_id;
        $product->detail = $request->detail;
        $product->cost = $request->cost;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
    
            $product->photo = $photoname;
        
        $product->save();
        return redirect()->back()->with('status', 'Product added successfully');
    }
    public function getDeleteProduct(Product $product){
        $product->delete();
        return redirect()->back()->with('status', $product->name.' Delete successfully!!!');
    }
    public function getEditProduct(Product $product){
        $data =[
            'product'=> $product
        ];
        return view('admin.product.edit', $data);
    }
}
