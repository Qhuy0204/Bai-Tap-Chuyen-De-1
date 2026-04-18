<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Hiển thị + tìm kiếm
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(5);

        return view('products.index', compact('products'));
    }

    // Thêm sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Thêm thành công');
    }

    // Cập nhật số lượng
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $product->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    // Xóa
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('success', 'Đã xóa');
    }
}