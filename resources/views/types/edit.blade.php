@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div>
                    <a class="btn btn-info my-3" href="{{ route('types.index') }}">Back</a>
                </div>
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h1>Edit Type</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('types.update', $type->id) }}" method="POST">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="" class="form-label">Type name</label>
                                <input type="text" name="type_name" class="form-control" value="{{ $type->type_name }}">
                            </div>
                            @error('type_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group d-grid mt-3">
                                <button type="submit" class="btn btn-success">insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
