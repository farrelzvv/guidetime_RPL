<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class BrowseProductsComponent extends Component
{
    public function addToCart($productId)
    {
        // Mencari produk berdasarkan ID dan ini adalah implementasi Factory Method
        $product = Product::find($productId);

        // Validasi apakah produk ditemukan.
        if (!$product) {
            session()->flash('error', 'Product not found.');
            return;
        }

        // Mengambil keranjang dari sesi atau membuat yang baru.
        $cart = session()->get('cart', []);

        // Menyimpan keranjang ke sesi.
        session()->put('cart', $cart);

        // Memberikan pesan sukses.
        session()->flash('message', "jadwal {$product->title} berhasil disimpan");
    }

    public function render()
    {
        // Mengembalikan view dengan semua produk.
        return view('livewire.browse-products-component', ['products' => Product::all()]);
    }
}
