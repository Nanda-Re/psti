<div>
  <h2>Add New Product</h2>
  <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name Field -->
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
      @error('name')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <!-- Price Field -->
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="hidden" id="price" name="price" value="{{ old('price') }}">
      <input type="text" class="form-control" id="formatted_price" value="{{ old('price') ? 'Rp. ' . number_format(old('price'), 0, ',', '.') : '' }}" required>

      @error('price')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <!-- Jenis Field -->
    <div class="form-group">
      <label for="jenis">Type:</label>
      <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" required>
      @error('jenis')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <!-- Photo Field -->
    <div class="form-group">
      <label for="image">Product Photo (optional):</label>
      <input type="file" class="form-control" id="image" name="image">
      @error('image')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Add Product</button>
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