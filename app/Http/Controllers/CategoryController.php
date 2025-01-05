<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // Fungsi untuk menampilkan produk berdasarkan kategori
    public function index($id)
    {
        // Factory Method: Mengambil data kategori berdasarkan ID
        $category = Category::find($id);

        // Validasi jika kategori tidak ditemukan
        if (!$category) {
            return abort(404, 'Category not found');
        }

        // Factory Method: Mengambil data produk berdasarkan kategori
        $products = Product::where('category_id', $id)->get();

        // MVC: Mengirim data ke view 'category'
        return view('category', compact('products', 'category'));
    }
}
