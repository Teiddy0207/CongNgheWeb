<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\File;

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
        // $request->validate([
        //     'name' => 'required|string|max:255', // Tên sản phẩm: bắt buộc, là chuỗi.
        //     'description' => 'nullable|string', // Mô tả: không bắt buộc.
        //     'price' => 'required|numeric|min:0.01', // Giá: bắt buộc, là số, lớn hơn 0.
        //     'store_id' => 'required|exists:stores,id', // Cửa hàng: bắt buộc, phải tồn tại trong bảng stores.
        // ], [
        //     'name.required' => 'Tên sản phẩm là bắt buộc.',
        //     'name.string' => 'Tên sản phẩm phải là một chuỗi.',
        //     'description.string' => 'Mô tả phải là một chuỗi.',
        //     'price.required' => 'Giá là bắt buộc.',
        //     'price.numeric' => 'Giá phải là một số.',
        //     'price.min' => 'Giá phải lớn hơn 0.',
        //     'store_id.required' => 'Cửa hàng là bắt buộc.',
        //     'store_id.exists' => 'Cửa hàng không tồn tại.',
        // ]);

        // Product::create($request->all());
        // return redirect()->route('products.index')->with('success', 'van de dc them');

        //code lưu ảnh và hiển thị ảnh
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'store_id' => 'required|exists:stores,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Kiểm tra nếu có tệp được gửi
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Đường dẫn tải lên  
            $uploadPath = public_path('storage/uploads');  
            
            // Kiểm tra và tạo thư mục nếu không tồn tại  
            if (!File::exists($uploadPath)) {  
                File::makeDirectory($uploadPath, 0755, true);  
            }  
            
            // Lưu ảnh vào thư mục public/storage/uploads  
            $file = $request->file('image');  
            $fileName = time() . '.' . $file->getClientOriginalExtension();  
            $file->move($uploadPath, $fileName);  
            $filePath = 'storage/uploads/' . $fileName; // Cập nhật đường dẫn lưu trữ công khai  
        } else {
            // Gán giá trị mặc định cho filePath nếu không có tệp được gửi
            $filePath = 'storage/uploads/default.jpg'; 
        }

        // Tạo sản phẩm
     
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'store_id' => $request->store_id,
                'image_path' => $filePath, // Lưu đường dẫn ảnh
            ]);
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
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

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $store = Store::all();
        return view('products.show', compact('product', 'store'));
    }
}
