<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::with('store')->get();
        $products = Product::with('store')->paginate(5); 
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Tên sản phẩm: bắt buộc, là chuỗi.
            'description' => 'nullable|string', // Mô tả: không bắt buộc.
            'price' => 'required|numeric|min:0.01', // Giá: bắt buộc, là số, lớn hơn 0.
            'store_id' => 'required|exists:stores,id', // Cửa hàng: bắt buộc, phải tồn tại trong bảng stores.
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là một chuỗi.',
            'description.string' => 'Mô tả phải là một chuỗi.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn 0.',
            'store_id.required' => 'Cửa hàng là bắt buộc.',
            'store_id.exists' => 'Cửa hàng không tồn tại.',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'van de dc them');
    }


    public function edit($id)
{
    $product = Product::findOrFail($id); // Lấy sản phẩm theo ID
    $stores = Store::all(); // Lấy tất cả cửa hàng để hiển thị trong dropdown
    return view('products.edit', compact('product', 'stores'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255', // Tên sản phẩm: bắt buộc, là chuỗi.
        'description' => 'nullable|string', // Mô tả: không bắt buộc.
        'price' => 'required|numeric|min:0.01', // Giá: bắt buộc, là số, lớn hơn 0.
        'store_id' => 'required|exists:stores,id', // Cửa hàng: bắt buộc, phải tồn tại trong bảng stores.
    ], [
        'name.required' => 'Tên sản phẩm là bắt buộc.',
        'name.string' => 'Tên sản phẩm phải là một chuỗi.',
        'description.string' => 'Mô tả phải là một chuỗi.',
        'price.required' => 'Giá là bắt buộc.',
        'price.numeric' => 'Giá phải là một số.',
        'price.min' => 'Giá phải lớn hơn 0.',
        'store_id.required' => 'Cửa hàng là bắt buộc.',
        'store_id.exists' => 'Cửa hàng không tồn tại.',
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->all()); // Cập nhật sản phẩm
    return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'van de co ma: ' . $product->id . 'da duoc xoa thanh cong!');
}
}
