<form action="{{ route('produk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Important for updating data -->
    <!-- Name Field -->
    <div class="form-group row align-items-center py-2">
        <label for="name" class="form-control-label col-sm-3 text-md-right text-white">Nama Produk:</label>
        <div class="col-sm-6 col-md-9">
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- Price Field -->
    <div class="form-group row align-items-center py-2">
        <label for="price" class="form-control-label col-sm-3 text-md-right text-white">Harga Produk:</label>
        <div class="col-sm-6 col-md-9">
            <input type="hidden" id="price" name="price" value="{{ $item->price }}">
            <input type="text" class="form-control" id="formatted_price" value="{{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}" required>

            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- Jenis Field -->
    <div class="form-group row align-items-center py-2">
        <label for="jenis" class="form-control-label col-sm-3 text-md-right text-white">Jenis/Kategori Produk:</label>
        <div class="col-sm-6 col-md-9">
            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $item->jenis }}" required>
            @error('jenis')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="form-group row align-items-center py-2">
      <label for="jenis" class="form-control-label col-sm-3 text-md-right text-white">Stok Produk:</label>
      <div class="col-sm-6 col-md-9">
        <input type="number" class="form-control" id="stok" name="stok" value="{{ $item->stok }}" required>
        @error('stok')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>

    <!-- Photo Field -->
    <div class="form-group row align-items-center py-2">
        <label for="image" class="form-control-label col-sm-3 text-md-right text-white">Product Photo (optional):</label>
        <div class="col-sm-6 col-md-9">
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="card-footer d-flex justify-content-between flex-row-reverse">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
