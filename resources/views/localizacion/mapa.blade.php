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
    <div class="card-header flex-wrap py-3">
        <div class="card-title">
            <h3 class="card-label">Mapa
            </h3>
        </div>
        
    </div>
    <div class="card-body" id="cargaMapa">
        
        <div class="row">
          <div class="col-md-12">
            <div id="map" style="height: 800px;"></div>
          </div>
          <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped" id="tabla_criaderos">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>LATITUD</th>
                  <th>LONGITUD</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($localizaciones as $l)
                <tr>
                  <td>{{ $l->id }}</td>
                  <td>{{ $l->latitud }}</td>
                  <td>{{ $l->longitud }}</td>
                </tr>
                @empty
                <h3 class="text-danger">NO EXISTEN DATOS</h3>
                @endforelse
              </tbody>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
<!--end::Card-->
@stop

@section('js')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi5qf2KXyB7kq7BOO-i9bVUNaq-paBe3A&callback=initMap&v=weekly" async></script>
<script type="text/javascript">

function initMap() {
  const myLatLng = { lat: {{ $ultimaLocalizacion->latitud }}, lng: {{ $ultimaLocalizacion->longitud }} };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
}

    // let map, infoWindow;
function loadlink(){
    // initMap();
    console.log('entro cada 5 segundos');
    $("#cargaMapa").load("{{ url('localizacion/ajaxMapa') }}");
}

// loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 15000);






</script>
@endsection