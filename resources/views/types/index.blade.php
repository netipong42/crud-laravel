@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div>
                    <a href="{{ route('types.create') }}" class='btn btn-info'>Add</a>
                </div>
                <hr>

                <table class="table">
                    <thead>
                        <tr>
                            <th>TypeName</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $key => $item)
                            <tr>
                                <td>{{ Str::limit($item->type_name, 30) }} </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <a href="{{ route('types.edit', $item->id) }}"
                                                class="btn btn-warning ">Edit</a>
                                        </div>
                                        <form action="{{ route('types.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $types->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
