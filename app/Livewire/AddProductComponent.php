<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads; // Menggunakan trait untuk fitur upload file.

    public $title, $description, $date, $image, $categories, $category_id;

    public function mount()
    {
        // Mengambil semua kategori dari database.
        $this->categories = Category::all();
    }

    public function saveProduct()
    {
        // Validasi data input termasuk gambar.
        $this->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|max:1024', // Maksimal 1MB
        ]);

        // Menyimpan gambar ke direktori 'products' di disk publik.
        $path = $this->image->store('products', 'public');

        // Menggunakan Factory Method untuk membuat produk baru.
        Product::create([
            'title' => $this->title,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'date' => $this->date,
            'image' => $path,
        ]);

        // Mengirim notifikasi sukses ke user.
        session()->flash('message', 'Product added successfully!');

        // Reset input setelah berhasil menambahkan produk.
        $this->reset(['title', 'description', 'date', 'image', 'category_id']);
    }

    public function render()
    {
        // Mengembalikan view dengan layout khusus admin.
        return view('livewire.add-product-component')->layout('components.layouts.admin');
    }
}
