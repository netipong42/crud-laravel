@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div>
                    <a class="btn btn-info my-3" href="{{ route('products.index') }}">Back</a>
                </div>
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="" class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
                            </div>
                            @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="" class="form-label">Type</label>
                                <select name="type_id" id="" class="form-control">
                                    @foreach ($types as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $product->type_id ? 'selected' : '' }}>
                                            {{ $item->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file" name="img_file" id="img" accept="image/*" class="form-control"
                                    onchange="preview(event)">
                            </div>
                            @error('img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group mt-3">
                                <img src="{{ asset('storage/' . $product->img) }}" alt="" id="output"
                                    class="img-fluid">
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Edit" class="btn btn-success  my-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function preview(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0])
    }
</script>
