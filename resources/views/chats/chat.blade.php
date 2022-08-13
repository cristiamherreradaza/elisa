@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection
@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <!-- Modal NUEVO GRUPO-->
    <div class="modal fade" id="kt_nuevo_grupo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="formulario-grupo-chat" enctype="multipart/form-data">{{-- para enviar archivos --}}
                        @csrf
                        <input type="hidden" name="grupo_chat_id" id="grupo_chat_id" value="0">
                        <div class="row">
                            {{-- Aqui guardamos el id_restaurant --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nombre
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="grupo_name" name="grupo_name" required />
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Descripcion
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="grupo_descripcion" name="grupo_descripcion" required />
                                </div>        
                            </div>
                        </div>
                        <div class="row" id="btn_crear_grupo">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-block btn-success" onclick="guardarPeopleGroup()">Guardar</button>
                            </div>
                        </div>

                    </form>

                    <hr>

                    <div class="row" style="display: none;" id="input_busca_personas_grupos">
                        {{-- Aqui Buscamos participantes --}}
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="busca-participante" name="busca-participante" placeholder="Añade Participante" required />
                            </div>        
                        </div>
                    </div>

                    <div class="row">
                        {{-- Aqui Buscamos participantes --}}
                        <div class="col-md-12">
                            <div class="mt-4 scroll scroll-pull">
                                <div id="chat-busqueda-participante">
                                    
                                </div> 
                            </div>     
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        {{-- Aqui mostramos a los participantes del grupo --}}
                        <div class="col-md-12">
                            <div class="mt-4 scroll scroll-pull">
                                <div id="chat-grupo-participante">
                                    
                                </div> 
                            </div>     
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-light-dark font-weight-bold " data-dismiss="modal">Salir</button>
                        </div>
                        {{-- <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-success font-weight-bold"  onclick="crear()">Crear</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal NUEVO GRUPO-->


	<!--begin::Card-->
	{{-- <div class="card card-custom gutter-b"> --}}
		
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Chats</span>
                </h3>
                <div class="card-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                        <li class="nav-item">
                            <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#chat_inbox">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-4" data-toggle="tab" href="#chat_grupo">Grupos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <div class="tab-content mt-5" id="myTabTables5">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="chat_inbox" role="tabpanel" aria-labelledby="chat_inbox">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            {{-- Aqui va lo del chat 1-1 --}}
                            <div class="card-body">
                                <!--begin::Chat-->
                                <div class="d-flex flex-row">
                                    <!--begin::Aside-->
                                    <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                                        <!--begin::Card-->
                                        <div class="card card-custom">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin:Search-->
                                                <div class="input-group input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="busca-chat" class="form-control py-4 h-auto" placeholder="Buscar persona" />
                                                </div>
                                                <!--end:Search-->
                                                <!--begin:Users-->
                                                <div class="mt-7 scroll scroll-pull">
                                                    <div id="chat-busqueda">
                                                        
                                                    </div>
                                                    <!--begin:User-->
                                                    @foreach ( $users as $u)
                                                        @if ($u->user)
                                                            <div class="d-flex align-items-center justify-content-between mb-5">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-circle symbol-50 mr-3">
                                                                        {{-- <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg" /> --}}
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" onclick="ajaxMensaje({{ $u->id }})">{{ (Auth::user()->id != $u->user->id)? $u->user->name : $u->user_to->name}}</a>
                                                                        {{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column align-items-end">
                                                                    {{-- <span class="text-muted font-weight-bold font-size-sm">35 mins</span> --}}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end:Users-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Aside-->
                                    <!--begin::Content-->
                                    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                                        <!--begin::Card-->
                                        <div id="mensajes-people">
                    
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Chat-->
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="chat_grupo" role="tabpanel" aria-labelledby="chat_grupo">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            {{-- Aqui va el chat grupal N-N --}}
                            <div class="card-body">
                                <!--begin::Chat-->
                                <div class="d-flex flex-row">
                                    <!--begin::Aside-->
                                    <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                                        <!--begin::Card-->
                                        <div class="card card-custom">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                {{-- Nuevo grupo --}}
                                                <div class="px-4 mb-2">
                                                    <a href="#" class="btn btn-primary font-weight-bold text-uppercase py-2 px-1 text-center" data-toggle="modal" onclick="abremodalNuevoGrupo()">Nuevo grupo</a>
                                                </div>
                                                <!--begin:Search-->
                                                <div class="input-group input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="busca-chat-grupo" class="form-control py-4 h-auto" placeholder="Buscar Grupo" />
                                                </div>
                                                <!--end:Search-->
                                                <!--begin:Users-->
                                                <div class="mt-1 scroll scroll-pull">
                                                    <div id="chat-busqueda-grupos">
                                                        
                                                    </div>
                                                </div>
                                                <hr>
                                                @php
                                                    $grupos = App\GruposChats::where('tipo_grupo_id', 2)->get();
                                                @endphp
                                                @foreach ( $grupos as $g) 
                                                    @php

                                                        $id  = Auth::user()->id;

                                                        $idg = $g->id;

                                                        $gc = App\ParticipanteGrupo::where('user_id',$id)
                                                                            ->where('grupo_chat_id',$idg)->first();

                                                    @endphp
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-50 mr-3">
                                                                {{-- <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg" /> --}}
                                                            </div>
                                                            @if ($id==$g->user_id or $gc)
                                                                <div class="d-flex flex-column">
                                                                    <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" onclick="ajaxMensajeGrupo('{{ $g->id }}')">{{ $g->nombre }}</a>
                                                                    {{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
                                                                </div>
                                                            @endif
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                            {{-- <span class="text-muted font-weight-bold font-size-sm">35 mins</span> --}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!--end:Users-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Aside-->
                                    <!--begin::Content-->
                                    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                                        <!--begin::Card-->
                                        <div id="mensajes-people-grupo">
                    
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Chat-->
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>

	{{-- </div> --}}
									<!--end::Card-->
@stop

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/basic/basic.js') }}"></script>
    <script type="text/javascript">
		//Llamamamos a lista de ajax
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        
        $('#tabla_criaderos').DataTable({
            order: [[ 0, "desc" ]],
            // searching: false,
            // lengthChange: false,
            language: {
                url: '{{ asset('datatableEs.json') }}'
            },
        });

        function nuevoCliente(){
            $('#modal-nuevo').modal('show');
            // alert("en desarrollo :v");
        }

        function editar(id, nombre, contacto, telefonos, direccion){
            // alert(id);
            $('#editar-cliente').val(id);
            $('#nombre').val(nombre);
            $('#contacto').val(contacto);
            $('#telefonos').val(telefonos);
            $('#direccion').val(direccion);

            $('#modal-nuevo').modal('show');
        }

        function eliminar(id, nombre){
            // alert(id);
            Swal.fire({
                title: "Quieres eliminar "+nombre+" "+id,
                text: "Ya no podras recuperarlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, borrar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    window.location.href = "{{ url('Cliente/elimina') }}/"+id;
                    Swal.fire(
                        "Borrado!",
                        "El participante fue eliminado.",
                        "success"
                    )
                    // result.dismiss can be "cancel", "overlay",
                    // "close", and "timer"
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelado",
                        "La operacion fue cancelada",
                        "error"
                    )
                }
            });
        }

        function publicidad(id){
            $('#cliente_id').val(id);
            $('#modal-publicicdad').modal('show');
            // alert(id);
        }

        function showMyImage(fileInput, numero) {

            var files = fileInput.files;
            $("#btnRimg_"+numero).show();
            console.log(numero);
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById("thumbnil_"+numero);
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }

        function mueveImagen(numero){
            $("#thumbnil_"+numero).attr('src', "{{ asset('assets/blanco.jpg') }}");
            $("#customFile_"+numero).val('');
            $("#btnRimg_1").hide();            
        }

        function publicidades(id){
            window.location.href = "{{ url('Publicidad/listado')}}/"+id;
        }

        function ajaxMensaje(grupo_id, persona){

            $.ajax({
                url: "{{ url('Mensaje/ajaxMensaje') }}",
                data: {
                    grupo: grupo_id,
                    persona: persona
                },
                type: 'POST',
                success: function(data) {

                    $('#mensajes-people').html(data);

                }
            })

        }

        function enviarMensaje(grupo_id){

            var mensaje = $('#mensaje').val();

            $.ajax({
                url: "{{ url('Mensaje/enviaMensaje') }}",
                data: {
                    grupo: grupo_id, 
                    messege: mensaje
                },
                type: 'POST',
                success: function(data) {

                    $('#mensajes-people').html(data);

                }
            })

        }

        
        $("#busca-chat").on('keyup', function(){

            var persona = $('#busca-chat').val();

            console.log(persona.length);

            if(persona.length > 1){

                $.ajax({
                    url: "{{ url('Mensaje/ajaxBuscaPersonaChat') }}",
                    data: {
                        persona: persona, 
                    },
                    type: 'POST',
                    success: function(data) {

                        $('#chat-busqueda').html(data);

                    }
                })
            
            }else{
                $('#chat-busqueda').html('');
            }

        }).keyup();

        $("#busca-participante").on('keyup', function(){

            var persona = $('#busca-participante').val();

            console.log(persona.length);

            if(persona.length > 1){

                $.ajax({
                    url: "{{ url('mensaje/ajaxBuscaParticipanteChat') }}",
                    data: {
                        persona: persona, 
                    },
                    type: 'POST',
                    success: function(data) {

                        $('#chat-busqueda-participante').html(data);

                    }
                })

            }else{
                $('#chat-busqueda-participante').html('');
            }

        }).keyup();

        function guardarPeopleGroup(){

            Swal.fire({
                title: "Esta seguro de crear el grupo",
                text: "Si lo creas podras añadir participantes!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, crear!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {

                    var datos = $('#formulario-grupo-chat').serializeArray();

                    $.ajax({
                        url: "{{ url('mensaje/guardarPeopleGroup') }}",
                        data: datos,
						dataType: 'json',
                        type: 'POST',
                        success: function(data) {
                            
                            if(data.status == 'success'){

                                Swal.fire({
                                    title: "Se creo el grupo con Exito!",
                                    icon : 'success',
                                    tiumer: 1500
                                })

                                $('#grupo_chat_id').val(data.grupo_chat_id);
                                $('#input_busca_personas_grupos').show('toggle');
                                $('#btn_crear_grupo').hide('toggle');

                            }

                        }
                    })


                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelado",
                        "La operacion fue cancelada",
                        "error"
                    )
                }
            });

        }

        function abremodalNuevoGrupo(){

            $('#formulario-grupo-chat')[0].reset();
            $('#input_busca_personas_grupos').hide('toggle');
            $('#btn_crear_grupo').show('toggle');

            $('#kt_nuevo_grupo').modal('show');
        }

        function ajaxAdicionaParticipante(participante_id){

            var grupo_id = $('#grupo_chat_id').val();
            
            $.ajax({
                url: "{{ url('mensaje/ajaxAdicionaParticipante') }}",
                data: {
                    participante: participante_id, 
                    grupo: grupo_id
                },
                type: 'POST',
                success: function(data) {
                    console.log(participante_id);
                    $('#chat-grupo-participante').html(data);
                }
            })

        }



        // function EliminaParticipanteGrupoChat(pg_id){

        //     var grupo_id = $('#grupo_chat_id').val();

        //     $.ajax({
        //         url: "{{ url('mensaje/EliminaParticipanteGrupoChat') }}",
        //         data: {
        //             participante: pg_id, 
        //             grupo: grupo_id
        //         },
        //         type: 'POST',
        //         success: function(data) {
        //             console.log(participante_id);
        //             $('#chat-grupo-participante').html(data);
        //         }
        //     })

        // }
    </script>
@endsection