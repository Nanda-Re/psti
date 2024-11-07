<div>
  <h2 >Add New Product</h2>
  <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name Field -->
    <div class="form-group row align-items-center py-2">
      <label for="name" class="form-control-label col-sm-3 text-md-right text-white">Nama Produk:</label>
      <div class="col-sm-6 col-md-9">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>

    <!-- Price Field -->
    <div class="form-group row align-items-center py-2">
      <label for="price" class="form-control-label col-sm-3 text-md-right text-white">Harga:</label>
      <div class="col-sm-6 col-md-9">
        <input type="hidden" id="price" name="price" value="{{ old('price') }}">
        <input type="text" class="form-control" id="formatted_price" value="{{ old('price') ? 'Rp. ' . number_format(old('price'), 0, ',', '.') : '' }}" required>

        @error('price')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>

    <!-- Jenis Field -->
    <div class="form-group row align-items-center py-2">
      <label for="jenis" class="form-control-label col-sm-3 text-md-right text-white">Jenis Produk:</label>
      <div class="col-sm-6 col-md-9">
        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" required>
        @error('jenis')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>

        <!-- Stok Field -->
        <div class="form-group row align-items-center py-2">
      <label for="jenis" class="form-control-label col-sm-3 text-md-right text-white">Stok Produk:</label>
      <div class="col-sm-6 col-md-9">
        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" required>
        @error('stok')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>

    <!-- Photo Field -->
    <div class="form-group row align-items-center py-2">
      <label for="image" class="form-control-label col-sm-3 text-md-right text-white">Foto Produk (optional):</label>
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

  @push('before-script')
  <script>
    $(function() {
      let formattedPriceInput = document.getElementById('formatted_price');
      let priceInput = document.getElementById('price');

      formattedPriceInput.addEventListener('keyup', function(e) {
        // Remove non-numeric characters except for "."
        let formattedValue = this.value.replace(/[^0-9]/g, '');
        // Format the visible input with "Rp." and thousand separators
        this.value = formattedValue ? 'Rp. ' + formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '';

        // Update the hidden input with the raw numeric value
        priceInput.value = formattedValue;
      });
    });
  </script>
  <script src="{{ asset('/assets/js/babeng.js') }}"></script>
  @endpush
</div>