<div class="row">
  <div class="col-12">
    <div class="product_card">
      <div class="row">
        <div class="col-lg-4">
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-auto">
        </div>

        <div class="col-lg-8">
          <div class="pc_content">
            <h2>{{ $product->title }}</h2>
            <p class="pcc_in">In <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a></p>
            <!-- Menampilkan tanggal produk -->
            <p class="pcc_date">{{ \Carbon\Carbon::parse($product->date)->format('F j, Y') }}</p>

            <p class="pcc_description">{{ $product->description }}</p>

            <div class="">
              <button wire:click="addToCart({{ $product->id }})" class="border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white py-2 px-4 rounded">Simpan Jadwal</button>
            </div>

            @if (session()->has('message'))
            <div class="alert alert-success my-2">{{ session('message') }}</div>
            @endif
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
