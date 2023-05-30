@extends('layouts.base')
@section('content')
    <div class="tab-content pt-0">
        @foreach ($products as $product)
            <div class="card p-0">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-fluid img-drogueria" src="{{ $product->img }}" alt="{{ $product->name }}" />
                        </div>
                        <div class="col-8 mt-2 p-0">
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="col-6" align='left'>{{ $product->price_dg }}</div>
                        <div class="col-6" align='rigth'>{{ $product->quantity }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
