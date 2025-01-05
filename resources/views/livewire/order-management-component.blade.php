<div>
  <!-- order history table -->

  <div class="com_card mx-2">
      <h3 class="com_card_title mb-3">All Orders</h3>

      <div class="table-responsive">
          <table class="data-table">
              <thead>
                  <tr>
                      <th>Judul Bimbingan</th> <!-- Mengganti 'Order ID' dengan 'Mentor' sesuai dengan kebutuhan -->
                      <th>Tanggal</th>
                      <th>Dosen</th>
                      <th>Status Reminder</th>
                      <th>Aksi</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach ($orders as $order)
                  <tr>
                      <td>{{ $order->product->title }}</td> <!-- Menampilkan judul produk -->
                      <td>{{ $order->created_at->format('d-m-Y') }}</td> <!-- Menampilkan tanggal pesanan -->
                      <td>
                          <!-- Menampilkan kategori berdasarkan ID produk -->
                          @if (isset($order->product->category_id))
                              {{ \App\Models\Category::find($order->product->category_id)->name ?? 'Kategori tidak ditemukan' }}
                          @else
                              Lokasi Kampus B
                          @endif
                      </td>
                      <td>{{ $order->status }}</td>
                      <td>
                          <button class="btn btn-primary" wire:click="approveOrder({{ $order->id }})">Reminder</button>
                          <button class="btn btn-danger" wire:click="cancelOrder({{ $order->id }})">Hapus</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
