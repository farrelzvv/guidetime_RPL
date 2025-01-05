<div>
  <!-- Add Product Form -->
  <div class="com_card mx-2">
      <h3 class="com_card_title mb-3">Tambah Jadwal Bimbingan</h3>

      <form wire:submit.prevent="saveProduct">
          <!-- Title -->
          <label for="title" class="form_label">Judul Bimbingan</label>
          <input type="text" wire:model="title" class="form-input" />

          <!-- Category -->
          <label for="category_id" class="form_label mt-2">Dosen</label>
          <select wire:model="category_id" class="form-input" required>
              <option value="">Pilih Dosen</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>

          <!-- Description -->
          <label for="description" class="form_label mt-2">Tambahkan Deskripsi</label>
          <textarea wire:model="description" class="form-input" id="description"></textarea>

          <!-- Date -->
          <label for="date" class="form_label mt-2">Tanggal</label>
          <input type="date" wire:model="date" class="form-input" />

          <!-- Image -->
          <label for="image" class="form_label mt-2">Gambar Tambahan</label>
          <input type="file" wire:model="image" class="form-input" />

          <!-- Submit -->
          <button type="submit" class="btn-one mt-3">Tambah Jadwal</button>
      </form>
  </div>
</div>
