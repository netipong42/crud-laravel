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
                                        <form action="{{ route('types.destroy', $item->id) }}" method="post"
                                            class="form_delete">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger btn-delete">delete</button>
                                        </form>
                                        <div class="ms-3">
                                            <a href="{{ route('types.show', $item->id) }}" class="btn btn-info">List</a>
                                        </div>
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

@push('js')
    <script>
        // $(document).ready(function() {
        //     $('.form_delete').submit(function(event) {
        //         event.preventDefault();
        //         const url = $(this).attr('action');
        //         $.ajax({
        //             url: url,
        //             type: "DELETE",
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //             },
        //             success: function() {
        //                 window.location.reload();
        //             }
        //         });
        //     });
        // });
    </script>
@endpush
