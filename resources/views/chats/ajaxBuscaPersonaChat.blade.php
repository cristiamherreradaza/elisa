@foreach ( $personas as $p) 
    @php

        $id  = Auth::user()->id;

        $idp = $p->id;

        $grupoChat = App\GruposChats::where('user_id',$id)
                            ->where('user_id_to',$idp)
                            ->orWhere(function($query) use($idp, $id){
                                $query->where('user_id',$idp)
                                      ->where('user_id_to',$id);
                            })->first();

        if($grupoChat){
            $grupo = $grupoChat->id;
        }else{
            $grupo = 0;
        }

    @endphp
    <div class="d-flex align-items-center justify-content-between mb-5">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-circle symbol-50 mr-3">
                {{-- <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg" /> --}}
            </div>
            <div class="d-flex flex-column">
                <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" onclick="ajaxMensaje('{{ $grupo }}','{{ $p->id }}')">{{ $p->name }}</a>
                {{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
            </div>
        </div>
        <div class="d-flex flex-column align-items-end">
            {{-- <span class="text-muted font-weight-bold font-size-sm">35 mins</span> --}}
        </div>
    </div>
@endforeach