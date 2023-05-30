<div class="col-12 div-drogueria p-1 mb-1">

    <input type="search" class="form-control" placeholder="Buscar" name="buscar" id="buscart">

</div>
<div class="card p-0">
    <div class="col-md-12">
        @foreach ($categories as $category)
            <div class="col-12 mb-2 div-drogueria" style="border-left: 10px solid {{ $category->color }}">
                <a href="{{ route('buscar.categoria', $category->id) }}">
                    <div class="row">
                        <div class="col-11">
                            <p style="color: {{ $category->color }}">{{ $category->name }}</p>
                        </div>
                        <div class="col-1 mt-2 p-0">
                            <i class="mdi mdi-chevron-right icon-drogueria"></i>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@section('js')
    <script>
        $('#buscar').on('keypress', function(e) {
            var buscar = $('#buscar').val();
            $.ajax({
                method: 'GET',
                url: 'dashboard/' + buscar + '/search',
                success: function(result) {
                    console.log('success');
                },
            });
        });
    </script>
@endsection
