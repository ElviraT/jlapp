<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link p-1 active" data-bs-toggle="tab" href="#drog" role="tab">
                        <small class="font-10">DROGUERIA</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1" data-bs-toggle="tab" href="#transferencia" role="tab">
                        <small class="font-10">TRANSFERENCIA</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1" data-bs-toggle="tab" href="#centro_salud" role="tab">
                        <small class="font-10">CENTROS DE SALUD</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content pt-0">
    <div class="tab-pane active" id="drog" role="tabpanel">
        @include('categorias.drogueria')
    </div>

    <div class="tab-pane" id="transferencia" role="tabpanel">
        <h1>transferencia</h1>
    </div>

    <div class="tab-pane" id="centro_salud" role="tabpanel">
        <h1>centro salud</h1>
    </div>
</div>
