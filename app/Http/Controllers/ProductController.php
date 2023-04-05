<?php
 
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product; 
 
class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('category')->get();
        return view('product.index', $data);
    }
    public function create()
    {
        $data['categories'] = Category::all();
        return view('product.create', $data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);
        
        /* $validated['photo'] =$request->file('photo')->store('image','public');*/
        
        $photo_file = $request->file('photo');
        $photo_extensi = $photo_file->extension();
        $photo_name = date('ymhdis').".". $photo_extensi;
        $photo_file->move(public_path('photo'),$photo_name);
        
        $products = Product::create([
            'photo' => $validated['photo'],
            'product_name' => $validated['product_name'],
            'product_description' => $validated['product_description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id']
        ]);
       
        return redirect()->route('product.index')->with('success','Product created successfully.');
    }

    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id);

        return view('product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $products = Product::find($id);
        $products->update($data);

        return redirect()->route('product.index')->with('success','Category updated successfully');

    }
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('product.index')->with('success','Category removed successfully');
    }
}