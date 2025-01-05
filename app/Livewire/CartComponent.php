<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public $cart = []; // Menyimpan data keranjang.
    public $total = 0; // Menyimpan total jumlah produk.

    public function mount()
    {
        // Memuat data keranjang dari sesi.
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function removeFromCart($productId)
    {
        // Menghapus produk dari keranjang jika ditemukan.
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            session()->put('cart', $this->cart);
            $this->calculateTotal();
            session()->flash('message', 'Jadwal bimbingan di hapus');
        }
    }

    public function updateQuantity($productId, $quantity)
    {
        // Memperbarui jumlah produk di keranjang.
        if (isset($this->cart[$productId]) && $quantity > 0) {
            $this->cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $this->cart);
            $this->calculateTotal();
            session()->flash('message', 'Jadwal Bimbingan Berhasil di perbarui');
        }
    }

    public function confirmOrder()
    {
        // Validasi apakah keranjang kosong.
        if (empty($this->cart)) {
            session()->flash('error', 'Tidak ada jadwal yang di simpan');
            return;
        }

        // Memproses pesanan untuk setiap item di keranjang.
        foreach ($this->cart as $productId => $item) {
            // Menggunakan Factory Method untuk membuat pesanan baru.
            Order::create([
                'product_id' => $productId,
                'user_id' => Auth::id(),
                'quantity' => $item['quantity'],
                'date' => $item['date'], // Menggunakan tanggal dari keranjang.
                'status' => 'pending',
            ]);
        }

        // Mengosongkan keranjang setelah pesanan dikonfirmasi.
        session()->forget('cart');
        $this->cart = [];
        $this->total = 0;

        session()->flash('message', "Jadwal Reminder Sudah dikirim kepada Operator. Operator akan mengabari kamu setiap Harinya.");
    }

    public function calculateTotal()
    {
        // Menghitung total jumlah produk di keranjang.
        $this->total = array_reduce($this->cart, function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);
    }

    public function render()
    {
        // Mengembalikan view dengan data keranjang dan total jumlah produk.
        return view('livewire.cart-component', ['cart' => $this->cart, 'total' => $this->total]);
    }
}
