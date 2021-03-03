@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
	<!--begin::Card-->
	<div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">Usuarios
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="{{ url('User/nuevo') }}" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
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
					</span>Nuevo Usuario</a>
				<!--end::Button-->
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-striped" id="tabla_usuarios">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Carnet</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Celulares</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($usuarios as $u)
					{{-- expr --}}
					@endforeach
					<tr>
						<td>{{ $u->id }}</td>
						<td>{{ $u->name }}</td>
						<td>{{ $u->ci }}</td>
						<td>{{ $u->email }}</td>
						<td>{{ $u->perfil }}</td>
						<td>{{ $u->celulares }}</td>
						<td nowrap="nowrap">
							<a href="#" class="btn btn-icon btn-warning btn-sm mr-2">
								<i class="flaticon-edit"></i>
							</a>
	
							<a href="#" class="btn btn-icon btn-danger btn-sm mr-2">
								<i class="flaticon2-delete"></i>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
									<!--end::Card-->
@stop

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/basic/basic.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
    	    $('#tabla_usuarios').DataTable();
    	} );
    </script>
@endsection