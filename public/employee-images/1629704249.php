<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Product as Product;
use App\Modules\Admin\Models\Category as Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	
	public function __construct(){
		if(!isset($_GET['section']) || $_GET['section'] == ''){
			echo "Section is missing.";
			die();
		}

	}

    public function ajaxCallFeatured(){
       
         $isFeaturedId = $_GET['isFeatured'];
         $affectedPro = DB::table('products')->where('is_featured','1')->update(['is_featured'=>0]);
         $updateFeature = DB::table('products')->where('id',$isFeaturedId)->update(['is_featured'=>1]);
         return 'Successfully done';
         
    }
    public function ajaxCallActiveFeatured(){
       
         $isFeaturedId = $_GET['isFeatured'];
         $affectedPro = DB::table('products')->where('is_featured','1')->update(['is_featured'=>0]);
         return 'Successfully done';
         
    }

  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = $_GET['section'];
        if(isset($_GET['p'])){

            $products = Product::Where('title', 'like', '%' . $_GET['p'] . '%')->where('section',$section)->orderBy('id', 'DESC')->paginate(20);

        }else{
            $products = Product::where('section',$section)->paginate(20);
           
        } 
        return view('Admin::products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        // $category =  DB::table('categories')->get();
        $section = $_GET['section'];
        $category_html = '<ul id="menu">'.$this->get_menu_tree(0,$section).'</ul>'; 
		
        return view('Admin::products.add_product',compact('category_html'));
    }
	
	private function get_menu_tree($parent_id,$section) 
    {
        $menu = "";
        $data= DB::table('categories')->where("parent_id",$parent_id)->where("section",$section)->get();
        
        foreach($data as  $c) {
               $menu .="<li data-value='".$c->id."''><div>".$c->category_name."</div>";
               
               $menu .= "<ul>".$this->get_menu_tree($c->id,$section)."</ul>"; //call  recursively
               
               $menu .= "</li>";
        }

        return $menu;
        
    }

    /**
     * Product a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //////////// new + new custom fields////////
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',
            "brand" => 'required',
            'status' => 'required',
            "link" => 'required',
            "original_price"=>'required',
            "image"=>'required',
            "section"=>'required',
            "parent_id"=>'required',
            'is_featured' => 'required'
            
        ],['parent_id.required' => 'Please Select Category']);
        if ($validator->fails()) { 
            return redirect()->back()->with('error',$validator->errors()->first());            
        }
		 $path = '';
		$image_name = null;
        if ($request->file('image')) {
            $image_name =$request->file('image')->getClientOriginalName();
            // $destination_path=public_path('/assets/product_images/');
            $pathString = base_path();
            $path = str_replace("\\framework","",$pathString);
            $path = str_replace("/framework","",$path);
            $destination_path=$path.'/assets/product_images/'; 
            $request->file('image')->move($destination_path,$image_name);
             $this->createThumbnail($image_name);
        }

        $product= new Product;
        $product->image=$image_name;
        $product->title=$request->title;
        $product->brand=$request->brand;
        $product->status=$request->status;
        $product->description=$request->description;
        $product->link=$request->link;
        $product->original_price=$request->original_price;
        $product->section=$request->section;
        if($request->is_featured == 1){
         $affectedPro = DB::table('products')->where('is_featured','1')->update(['is_featured'=>0]);
         $product->is_featured=$request->is_featured;
        }else{
         $product->is_featured=$request->is_featured; 
        }
        
        $product->category_id=$request->parent_id;
		if($request->has('sale_price') && $request->input('sale_price') != ''){
			$product->sale_price=$request->sale_price;
		}
        
        $product->Save();
        return redirect('/products?section='.$request->section)->with('success','Product Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {	
		$section = $_GET['section'];
        $category_html = '<ul id="menu">'.$this->get_menu_tree(0,$section).'</ul>'; 
        $product=Product::find($id);
		$productCategory = Category::find($product->category_id);
		$productCategory = $productCategory->category_name;
        return view('Admin::products.edit_product',compact('product','category_html','productCategory'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {	

        $validator = Validator::make($request->all(), [ 
            'title' => 'required',
            "brand" => 'required',
            'status' => 'required',
            "link" => 'required',
            "original_price"=>'required',
            'is_featured' => 'required',
            //"image"=>'jpeg,png,jpg,gif,svg|max:2048',
            "section"=>'required',
            
        ]);
        if ($validator->fails()) { 
            return redirect()->back()->with('error',$validator->errors()->first());            
        }
        $product = Product::find($id);
       //  dd($product->id);
        if ($request->file('image')) {
            $image_name =$request->file('image')->getClientOriginalName();
            // $destination_path=public_path('/assets/product_images/');
            $pathString = base_path();
            $path = str_replace("\\framework","",$pathString);
            $path = str_replace("/framework","",$path);
            $destination_path=$path.'/assets/product_images/'; 
            $request->file('image')->move($destination_path,$image_name);
            $product->image=$image_name;
            $this->createThumbnail($image_name);
        }
        $product->title=$request->title;
        $product->brand=$request->brand;
        $product->status=$request->status;
        $product->description=$request->description;
        $product->link=$request->link;
        $product->original_price =$request->original_price;
         
       if($request->is_featured == 1){
         $affectedPro = DB::table('products')->where('is_featured','1')->update(['is_featured'=>0]);
         $product->is_featured=$request->is_featured;
        }else{
         $product->is_featured=$request->is_featured; 
        }

        $product->section=$request->section;
		if($request->has('sale_price') && $request->input('sale_price') != ''){
			$product->sale_price=$request->sale_price;
		}
		$product->category_id=$request->parent_id;
        $product->Save();
        return redirect('/products?section='.$request->section)->with('success','Product Updated Successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/products?section='.$_GET['section'])->with('success','Product Delete Successfully.');
    }  

   public function createthumb($imageName){


   }

     public function createThumbnail($imageName){

        $pathString = base_path();
        $path = str_replace("\\framework","",$pathString);
        $path = str_replace("/framework","",$path);
        $directoryUrl = $path.'/assets/product_images/'; 
        $filePath = $directoryUrl.$imageName;
        $thumbnailPath = $directoryUrl.'350x250/'.$imageName;

        $img = Image::make($filePath); 
        $img->backup();
        $img->resize(350, 250);
        $img->save($thumbnailPath);
        $img->reset();

        $pathString = base_path();
        $path = str_replace("\\framework","",$pathString);
        $path = str_replace("/framework","",$path);
        $directoryUrl = $path.'/assets/product_images/'; 
        $filePath = $directoryUrl.$imageName;
        $thumbnailPath = $directoryUrl.'650x350/'.$imageName;

        $img = Image::make($filePath); 
        $img->backup();
        $img->resize(650, 350);
        $img->save($thumbnailPath);
        $img->reset();

         $pathString = base_path();
        $path = str_replace("\\framework","",$pathString);
        $path = str_replace("/framework","",$path);
        $directoryUrl = $path.'/assets/product_images/'; 
        $filePath = $directoryUrl.$imageName;
        $thumbnailPath = $directoryUrl.'300x200/'.$imageName;

        $img = Image::make($filePath); 
        $img->backup();

        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailPath);
        $img->reset();

        return true;
    }

    public function isFeatured(){
        $data= DB::table('products')->where("is_featured",1)->get();
        return view('Admin::products.isFeatured',compact('data'));
    }


    public function script(){


        $pathString = base_path();
        $path = str_replace("\\framework","",$pathString);
        $path = str_replace("/framework","",$path);
        $directoryUrl = $path.'/assets/product_images/'; 
        $newDirectoryUrl = $path.'/assets/product_images/300x200/'; 
        $images = glob($directoryUrl . "*.*");
  
         foreach($images as $image)
          {

            // echo "<pre>";
            $explodedData = explode('/',$image);

            $imageName = end($explodedData);
            $img = Image::make($image); 
            $img->backup();
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($newDirectoryUrl.$imageName);
            $img->reset();

            }
            echo "Script completed";

    }
   
}






