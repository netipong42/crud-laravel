@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        Name : {{ $type->type_name }}
                        <br>
                        <hr>
                        @foreach ($type->listProduct as $item)
                            <div>
                                name : {{ $item->name }}
                                price : {{ number_format($item->price) }}
                                stock : {{ number_format($item->stock) }}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
