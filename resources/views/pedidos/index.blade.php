<div class="tab-content pt-0">
    @foreach ($transferencias as $transferencia)
        <div class="card p-0">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            <img class="img-fluid img-drogueria"
                                src="{{ env('APP_URL_WEB') . $transferencia->Product->img }}"
                                alt="{{ $transferencia->Product->name }}" />
                        </div>
                    </div>
                    <div class="col-9 mt-1">
                        <div class="row">
                            <strong>
                                <p>{{ $transferencia->Product->name }}{{ ' - ' }}{{ $transferencia->Pharmacy->name }}
                                </p>
                            </strong>
                            <hr>
                            {{-- <div class="col-6" align='left'>{{ '$ ' }}{{ $transferencia->Product->price_tf }}</div> --}}
                            <div class="col-6" align='rigth'>{{ 'Cantidad: ' }}{{ $transferencia->cantidad }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
