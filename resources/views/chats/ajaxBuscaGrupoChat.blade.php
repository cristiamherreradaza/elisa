@foreach ( $grupos as $g) 
    <div class="d-flex align-items-center justify-content-between mb-5">
        <div class="d-flex align-items-center">
            <div class="d-flex flex-column">
                <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" onclick="ajaxMensajeGrupo('{{ $g->id }}')">{{ $g->nombre }}</a>
            </div>
        </div>
    </div>
@endforeach