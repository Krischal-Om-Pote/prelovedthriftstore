<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('categories'));
    }
    public function store(ProductFormRequest  $request)
    {
        $validatedData = $request->validated();

        $product = new Product;
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->description = $validatedData['description'];
        $product->meta_title = $validatedData['meta_title'];
        $product->meta_keyword = $validatedData['meta_keyword'];
        $product->meta_description = $validatedData['meta_description'];
        $product->status = $request->status == true ? '1' : '0';
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('admin/product')->with('message', 'Product Added Successfully');
    }
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('admin.product.edit', compact('product'), compact('categories'));
    }

    public function update(ProductFormRequest  $request, $product_id)
    {
        // dd($request->all());
        $validatedData = $request->validated();
        $product = Product::findOrFail($product_id);
        // echo "<pre>";
        // print_r($Product);
        // die();

        if ($request->hasFile('image')) {
            $path = 'uploads/product/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/product/', $filename);
            // $Product->image = $filename;

            $product->image = $filename;
        } else {
            $product->image = $product->image;
        }

        $status = $request->status = true ? '1' : '0';
        /*$updateCat = Product::where('id', $product_id)->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                // 'status' => $status,
                'category_id' => $request->category_id,
                'image' => $filename,
            ]
        );*/

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_keyword = $request->meta_keyword;
        $product->status = $request->status;

        $product->save();

        return redirect('admin/product')->with('message', 'Product Updated Successfully');

        // $updateCat = Product::where('id', $product_id)->update(
        //     [
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'meta_title' => $request->meta_title,
        //         'meta_keyword' => $request->meta_keyword,
        //         'meta_description' => $request->meta_description,
        //         // 'status' => $request->status,
        //     ]
        // );
        // return redirect('admin/product')->with('message', 'Product Updated Successfully');
    }

    public function destroy(Request $request)
    {
        # code...
        $check = Product::destroy($request->id);
        if ($check) {
            return redirect('admin/product')->with('message', 'Product Deleted Successfully');
        } else {
            return redirect('admin/product')->with('message', 'Fail to Delete Product');
        }
    }
    public function search(Request $req)
    {
        // return $req->input();
        return $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
    }
}
