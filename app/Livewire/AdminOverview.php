<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class AdminOverview extends Component
{
    public $totalOrders; // Menyimpan jumlah total pesanan.
    public $totalProducts; // Menyimpan jumlah total produk.
    public $totalCategories; // Menyimpan jumlah total kategori.

    public function mount()
    {
        // Memuat data overview dari database.
        $this->loadOverviewData();
    }

    public function loadOverviewData()
    {
        // Menggunakan Factory Method untuk memproses data.
        $this->totalOrders = Order::count();
        $this->totalProducts = Product::count();
        $this->totalCategories = Category::count();
    }

    public function render()
    {
        // Mengembalikan view dengan layout admin.
        return view('livewire.admin-overview')->layout('components.layouts.admin');
    }
}
