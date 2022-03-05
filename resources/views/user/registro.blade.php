@extends('layouts.app')

@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO</h3>
                
            </div>
            <!--begin::Form-->
            <form action="{{ url('User/guarda') }}" method="POST" id="formularioPersona">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required />
                            </div>        
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Carnet
                                <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="ci" name="ci" required />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email
                                <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password
                                    <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha Nacimiento
                                    <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Direccion
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required />
                            </div>        
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefonos
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="celulares" name="celulares" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="map" style="height:650px; width:650px;"></div>                
                        <div id="lat1">lat</div>
                        <div id="lng1">long</div>
                        <div id="zoom">zoom</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mr-2 btn-block" onclick="guarda()">Guardar</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('User/listado') }}" class="btn btn-secondary btn-block">Volver</a>
                        </div>
                    </div>

                </div>
                
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    
</div>

@stop

@section('js')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi5qf2KXyB7kq7BOO-i9bVUNaq-paBe3A&callback=initMap&v=weekly" async></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi5qf2KXyB7kq7BOO-i9bVUNaq-paBe3A" async></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?"></script> --}}
    <script type="text/javascript">

    // let map;
        $.ajaxSetup({
            // definimos cabecera donde estarra el token y poder hacer nuestras operaciones de put,post...
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function guarda()
        {
            if ($("#formularioPersona")[0].checkValidity()) {

                $("#formularioPersona").submit();
                Swal.fire("Excelente!", "Se guardo el distrito!", "success");

            }else{
                $("#formularioPersona")[0].reportValidity();
            }
        }

      
        /*function map_init() {
            var lt=48.451778;
            var lg=31.646305;

            var myLatlng = new google.maps.LatLng(lt,lg);
            var mapOptions = {
                center: new google.maps.LatLng(lt,lg),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById('map'),mapOptions);   
            var marker = new google.maps.Marker({
                position:myLatlng,
                map:map,
                draggable:true
            });

            google.maps.event.addListener(
                marker,
                'drag',
                function() {
                    document.getElementById('lat1').innerHTML = marker.position.lat();
                    document.getElementById('lng1').innerHTML = marker.position.lng();
                    document.getElementById('zoom').innerHTML = mapObject.getZoom();

                    // Dynamically show it somewhere if needed
                    // $(".x").text(marker.position.lat().toFixed(6));
                    // $(".y").text(marker.position.lng().toFixed(6));
                    // $(".z").text(map.getZoom());

                }
            );                  
        }*/

        $(function() {
            // console.log( "ready!" );
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
            }
            else
            {
                alert('It seems like Geolocation, which is required for this page, is not enabled in your browser.');
            }
            // map_init();

            var myLatlng = new google.maps.LatLng(-25.363882,131.044922);

            var mapOptions = {
                zoom: 4,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Place a draggable marker on the map
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable:true,
                title:"Drag me!"
            });

  

            // fin para el mapa
        });

        function successFunction(position) 
        {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            // muestraMapa(lat, long);
            // alert('Your latitude is :'+lat+' and longitude is '+long);
        }

        function errorFunction(position) 
        {
            alert('Error!');
        }



        

    </script>
@endsection