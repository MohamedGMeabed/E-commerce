<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ImageTrait;
    public function index() {
        $products = Product::with('Categories')->get();
        $categories = Category::where('active',1)->get();
        return view('backend.products', compact('products','categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            if(isset($request->has_offer)) {
                $offer =  $request->has_offer = 1;
              } else {
                  $offer = $request->has_offer = 0;
              } 
              $image_name = $this->saveImage($request->image,'images/products');
              $products = Product::create(['name' => $request->name,
                                          'description' => $request->description,
                                          'price' => $request->price,
                                          'in_stock' => $request->in_stock,
                                          'price_before' => $request->price_before,
                                          'has_offer' =>  $offer ,
                                          'start_date' => $request->start_date,
                                          'end_date' => $request->end_date,
                                          'image' => $image_name
                                         ]);
            $products->Categories()->attach($request->category_id);
          //  $products->Categories()->sync($request->category_id);
           // $products->Categories()->syncWithoutDetaching($request->category_id);
              toastr()->success('Product Add Successfully');
              return redirect()->route('admin.products');
        }catch(Exception $e){
            return redirect()->route('admin.products')->with($e->getMessage());
        }
    }


    public function update(ProductRequest $request, Product $product)
    { //  dd($request->all());
        if(isset($request->has_offer)) {
           $offer = $product->has_offer = 1;
          } else {
           $offer = $product->has_offer = 0;
          }
        if($request->hasFile('image') || $request->image != ''){
           unlink("images/products/".$product->image);
           $image_name = $this->saveImage($request->image,'images/products');
           $product->update(['name' => $request->name,
                           'description' => $request->description,
                           'price' => $request->price,
                           'in_stock' => $request->in_stock,
                           'price_before' => $request->price_before,
                           'has_offer' =>  $offer ,
                           'start_date' => $request->start_date,
                           'end_date' => $request->end_date,
                           'image' => $image_name
                        ]);
        }
        $product->update(['name' => $request->name,
                           'description' => $request->description,
                           'price' => $request->price,
                           'in_stock' => $request->in_stock,
                           'price_before' => $request->price_before,
                           'has_offer' =>  $offer ,
                           'start_date' => $request->start_date,
                           'end_date' => $request->end_date,
                        ]);
   
        toastr()->success('Prodct Update Successfully');
        return redirect()->route('admin.products');
    }

    public function destroy( Product $product)
    {
        $product->delete();
        unlink("images/products/".$product->image);
        toastr()->success('Product Delete Successfully');
        return redirect()->route('admin.products');
    }
}
