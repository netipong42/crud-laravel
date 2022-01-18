@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div>
                    <a class="btn btn-info my-3" href="{{ route('products.create') }}">Add products</a>
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $res)
                            <tr>
                                <td class="text-center">
                                    @if ($res->img)
                                        <img src="{{ asset('storage/' . $res->img) }}" alt="" width="150">
                                    @else
                                        <img src="https://api.lorem.space/image/game?w=100&h=100" alt="" srcset="">
                                    @endif
                                </td>
                                <td>{{ Str::limit($res->name, 15) }}</td>
                                <td>{{ Str::limit($res->typeProduct->type_name, 20) }}</td>
                                <td>{{ number_format($res->price) }}</td>
                                <td class="">
                                    <div class="d-flex">
                                        <a class="btn btn-warning me-2"
                                            href="{{ route('products.edit', $res->id) }}">Edit</a>
                                        <form action="{{ route('products.destroy', $res->id) }}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
