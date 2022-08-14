<div class="table-responsive m-t-40">
    <table class="table table-bordered table-hover table-striped" id="tabla-insumos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $participantes as $p) 
                @php
                    $idp = $p->user_id;
                    $persona = App\User::where('id',$idp)->first();
                @endphp
                <tr>
                    <td>{{ (Auth::user()->id == $idp)? 'Tu' : $persona->name }}</td>
                    <td>
                        @if (Auth::user()->id == $idp)
                            {{ 'Admin' }}
                        @else
                            <button type="button" class="btn btn-xs btn-icon btn-danger" onclick="eliminaParticipanteGrupoChat('{{ $p->id }}')">
                                <i class="flaticon2-cross"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tbody>
        </tbody>
    </table>
</div>