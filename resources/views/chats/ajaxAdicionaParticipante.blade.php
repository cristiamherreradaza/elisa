@foreach ( $participantes as $p) 
    @php


        $idp = $p->user_id;
        $persona = App\User::where('id',$idp)->first();

    @endphp
    <div class="d-flex align-items-center justify-content-between mb-1">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-circle symbol-50 mr-3">
                {{-- <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg" /> --}}
            </div>
            <div class="d-flex flex-column">
                <p>{{ $persona->name }}
                    <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" onclick="EliminaParticipanteGrupoChat('{{ $p->id }}')"><i class="flaticon2-cross"></i></a>
                </p>
                {{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
            </div>
        </div>
        <div class="d-flex flex-column align-items-end">
            {{-- <span class="text-muted font-weight-bold font-size-sm">35 mins</span> --}}
        </div>
    </div>
@endforeach