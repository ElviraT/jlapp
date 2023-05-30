@extends('layouts.base')
@section('content')
    <div class="tab-content pt-0">
        @foreach ($products as $product)
            <div class="card p-0">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-3">
                            <div class="row">
                                <img class="img-fluid img-drogueria" src="{{ env('APP_URL_WEB') . $product->img }}"
                                    alt="{{ $product->name }}" />
                            </div>
                        </div>
                        <div class="col-9 mt-1">
                            <div class="row">
                                <strong>
                                    <p>{{ $product->name }}</p>
                                </strong>
                                <div class="col-6" align='left'>{{ '$ ' }}{{ $product->price_tf }}</div>
                                <div class="col-6" align='rigth'>{{ 'Cantidad: ' }}{{ $product->quantity }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
