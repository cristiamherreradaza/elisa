@foreach ($grupos as $g)
    @php
        $grupo_chat_id   = $g;
        $grupo = App\GruposChats::where('id', $grupo_chat_id)
                        ->first();
    @endphp
    <div class="d-flex align-items-center justify-content-between mb-1">
        <div class="d-flex align-items-center">
            <input type="hidden" name="grupo_panico_id" id="grupo_panico_id"/>
            <div class="d-flex flex-column">
                <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{ $grupo->nombre }}</a>
            </div>
        </div>
        <div class="d-flex flex-column align-items-end">
        </div>
    </div> 
@endforeach