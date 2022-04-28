@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection
@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
	<!--begin::Card-->
	<div class="card card-custom gutter-b">

        <!-- Modal-->
        {{-- <div class="modal fade" id="modal-publicicdad" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PUBLICDAD <span class="text-primary"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('Publicidad/guarda') }}" method="POST" id="formulario-permiso" enctype = "multipart/form-data">
                            @csrf
                            <input type="hidden" id="cliente_id" name="cliente_id" value="0">
                            <input type="text" id="publicidad_id" name="publicidad_id" value="0">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Descripcion
                                        <span class="text-danger">*</span></label>
                                        <input type="text"  id="descripcion" name="descripcion" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="archivo[]"
                                            id="customFile_1" onchange="showMyImage(this, 1)" />
                                        <label class="custom-file-label" for="customFile">Elegir</label>
                                    </div>
                                    <center>
                                    <div style="width: 250px;">
                                        <img id="thumbnil_1" class="img-fluid" style="margin-top: 10px;" width="80%" />
                                    </div>
                                    </center>
                                    <br>
                                    <button type="button" class="btn btn-danger mr-2 btn-block"
                                        id="btnRimg_1" style="display:none;"
                                        onclick="mueveImagen(1)">Quitar Imagen
                                    </button>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Fecha Inicio
                                        <span class="text-danger">*</span></label>
                                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Fecha Fin
                                        <span class="text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cantidad de publicaciones
                                        <span class="text-danger">*</span></label>
                                        <input type="number" id="cantidad_publicaciones" name="cantidad_publicaciones" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-success">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light-dark font-weight-bold" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- fin inicio modal  --}}

        <!-- Modal-->
        {{-- <div class="modal fade" id="modal-nuevo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">PERMISOS DEL USUARIOS <span class="text-primary"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('Cliente/guarda') }}" method="POST" id="formulario-permiso">
                            @csrf
                            <input type="hidden" id="editar-cliente" name="editar-cliente" value="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nombre
                                        <span class="text-danger">*</span></label>
                                        <input type="text"  id="nombre" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contacto
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="contacto" name="contacto" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Telefonos
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="telefonos" name="telefonos" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Direccion
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="direccion" name="direccion" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-success">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light-dark font-weight-bold" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- fin inicio modal  --}}

		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">Listado de Cleintes
				</h3>
			</div>
			<div class="card-toolbar">
				{{-- <!--begin::Button-->
				<a onclick="nuevoCliente()" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
							height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<circle fill="#000000" cx="9" cy="15" r="6" />
								<path
									d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
									fill="#000000" opacity="0.3" />
							</g>
						</svg>
                    <!--end::Svg Icon-->
					</span>Nuevo Cliente</a>
				<!--end::Button--> --}}
			</div>
		</div>
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
                                <input type="text" class="form-control py-4 h-auto" placeholder="Email" />
                            </div>
                            <!--end:Search-->
                            <!--begin:Users-->
                            <div class="mt-7 scroll scroll-pull">
                                <!--begin:User-->
                                {{-- @dd($users[0]->user) --}}
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

                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_11.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Charlie Stone</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Art Director</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">7 hrs</span>
                                        <span class="label label-sm label-success">4</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_10.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Teresa Fox</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Web Designer</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">3 hrs</span>
                                        <span class="label label-sm label-danger">5</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_13.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Giannis Nelson</a>
                                            <span class="text-muted font-weight-bold font-size-sm">IT Consultant</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">2 days</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_15.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Carles Puyol</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Operator</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">5 mins</span>
                                        <span class="label label-sm label-success">9</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_16.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Ana Torn</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Head Of Finance</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">2 days</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_18.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Lisa Pears</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Web Designer</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">6 mins</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_20.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Amanda Bold</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Art Director</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">3 hrs</span>
                                        <span class="label label-sm label-warning">7</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_21.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Nick Jhonson</a>
                                            <span class="text-muted font-weight-bold font-size-sm">IT Consultant</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">10 mins</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_19.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Sarah Larson</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Web Designer</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">4 hrs</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_22.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Matt Pears</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Head of Development</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">35 mins</span>
                                        <span class="label label-sm label-success">5</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_23.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Tim Stone</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Web Developer</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">5 hrs</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_17.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Jhon Richardson</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Head of Development</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">1 week</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_18.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Ana Kiskia</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Web Master</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">35 mins</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_14.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Nick Stone</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Art Director</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">3 hrs</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
                                <!--begin:User-->
                                {{-- <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                            <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_13.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Nick Nilson</a>
                                            <span class="text-muted font-weight-bold font-size-sm">Software Arcitect</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-muted font-weight-bold font-size-sm">3 days</span>
                                    </div>
                                </div> --}}
                                <!--end:User-->
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

        function ajaxMensaje(grupo_id){

            $.ajax({
                url: "{{ url('Mensaje/ajaxMensaje') }}",
                data: {
                    grupo: grupo_id
                },
                type: 'POST',
                success: function(data) {

                    $('#mensajes-people').html(data);

                }
            })

        }
		// $(function () {
		// 	// funcion para llamar a los datos iniciales de la tabla
		// 	let datosBusquda = $('#formulario-busqueda-usuarios').serializeArray();

		// 	$.ajax({
		// 		url: "{{ url('User/ajaxListado') }}",
		// 		data: datosBusquda,
		// 		type: 'POST',
		// 		success: function(data) {
		// 			$('#ajaxUser').html(data);
		// 		}
		// 	});
    	// });

		// function buscaUsuario(){

		// 	let datosBusqueda = $('#formulario-busqueda-usuarios').serializeArray();

		// 	$.ajax({
		// 		url: "{{ url('User/ajaxListado') }}",
		// 		data: datosBusqueda,
		// 		type: 'POST',
		// 		success: function(data) {
		// 			$('#ajaxUser').html(data);
		// 		}
		// 	});

		// }

		// function listaFamiliar(id){
		// 	window.location.href = "{{ url('User/listaFamiliar')}}/"+id;
		// }

		// function listaSector(id){
		// 	window.location.href = "{{ url('User/listaSector')}}/"+id;
		// }
    </script>
@endsection