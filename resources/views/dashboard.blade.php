@extends('layouts.base')
@section('css')
    <style>
        .tracking-widest {
            background: #A2D45E !important;
        }
    </style>
@endsection
@section('content')
    <div class="tab-content pt-0">
        @include('vista_menu_inferior.index')
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
