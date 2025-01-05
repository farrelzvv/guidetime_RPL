<div class="mt-5">
    <div class="row">
        @if (session()->has('message'))
            <p style="color: green;">{{ session('message') }}</p>
        @endif
  
        @if (session()->has('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
  
        @if (empty($cart))
            <p>Your cart is empty.</p>
        @else
            <div class="col-12">
                <div class="product_card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mentor</th>
                                    <th>Tanggal</th>
                                    <th>Sesi</th> 
                                    <th>Edit</th>
                                </tr>
                            </thead>
  
                            <tbody>
                                @foreach ($cart as $productId => $item)
                                    <tr>
                                        <td>{{ $item['title'] }}</td>
                                        <td>{{ $item['date'] }}</td>
                                        <td>
                                            <!-- Memeriksa jika 'category_id' ada dalam item -->
                                            @if (isset($item['category_id']))
                                                <!-- Menampilkan kategori berdasarkan ID produk -->
                                                {{ \App\Models\Category::find($item['category_id'])->name ?? 'Kategori tidak ditemukan' }}
                                            @else
                                                Lokasi Kampus B
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-warning" wire:click="removeFromCart({{ $productId }})">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
  
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td></td>
                                    <td></td>
                                    <td><button wire:click="confirmOrder" class="btn btn-primary">Aktifkan Reminder</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
  </div>
  