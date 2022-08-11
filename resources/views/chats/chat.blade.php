@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection
@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
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
                                                    <a href="#" class="btn btn-primary font-weight-bold text-uppercase py-2 px-1 text-center" data-toggle="modal" data-target="#kt_inbox_compose">Nuevo grupo</a>
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
                                                    <input type="text" id="busca-chat" class="form-control py-4 h-auto" placeholder="Buscar persona" />
                                                </div>
                                                <!--end:Search-->
                                                <!--begin:Users-->
                                                <div class="mt-7 scroll scroll-pull">
                                                    <div id="chat-busqueda">
                                                        
                                                    </div>
                                                    <!--begin:User-->
                                                    @foreach ( $users as $u)
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
                        <div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-right" id="kt_inbox_compose" role="dialog" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!--begin::Form-->
                                    <form id="kt_inbox_compose_form">
                                        <!--begin::Header-->
                                        <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-bottom">
                                            <h5 class="font-weight-bold m-0">Nuevo Grupo</h5>
                                            <div class="d-flex ml-2">
                                                <span class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                                    <i class="ki ki-close icon-1x"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="d-block">
                                            <!--begin::To-->
                                            <div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-45px">
                                                <div class="text-dark-50 w-75px">Nombre: </div>
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <input type="text" class="form-control border-0" name="compose_to"/>
                                                </div>
                                            </div>
                                            <!--end::To-->
                                            <!--begin::Subject-->
                                            <div class="border-bottom">
                                                <input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Participantes" />
                                            </div>
                                            <!--end::Subject-->
                                            <!--begin::Message-->
                                            <div id="kt_inbox_compose_editor" class="border-0" style="height: 150px"></div>
                                            <!--end::Message-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center mr-3">
                                                <!--begin::Send-->
                                                <div class="btn-group mr-4">
                                                    <span class="btn btn-primary font-weight-bold px-6">Crear</span>
                                                </div>
                                                <!--end::Send-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Footer-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
                        <!--end::Compose-->
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
                        "El registro fue eliminado.",
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
    </script>
@endsection