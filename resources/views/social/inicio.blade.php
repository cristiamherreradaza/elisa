@extends('layouts.social')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<!--end::Subheader-->
<!--begin::Entry-->
<style>
    .pink-textarea textarea.md-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink-textarea.md-form label.active {
  color: #f48fb1;
}
.active-pink-textarea.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #f48fb1;
}


.amber-textarea textarea.md-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #ffa000;
  box-shadow: 0 1px 0 0 #ffa000;
}
.active-amber-textarea.md-form label.active {
  color: #ffa000;
}
.active-amber-textarea.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #ffa000;
}


.active-pink-textarea-2 textarea.md-textarea {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink-textarea-2.md-form label.active {
  color: #f48fb1;
}
.active-pink-textarea-2.md-form label {
  color: #f48fb1;
}
.active-pink-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #f48fb1;
}


.active-amber-textarea-2 textarea.md-textarea {
  border-bottom: 1px solid #ffa000;
  box-shadow: 0 1px 0 0 #ffa000;
}
.active-amber-textarea-2.md-form label.active {
  color: #ffa000;
}
.active-amber-textarea-2.md-form label {
  color: #ffa000;
}
.active-amber-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #ffa000;
}
</style>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <h3>&nbsp;</h3>
        {{-- cabeceras --}}
        
        {{-- fin cabeceras --}}

        {{-- modal registra publicacion --}}
        @if (session()->get('user'))
            <div class="modal fade" id="modal-publicacion-articulos" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
            
                        <div class="modal-body">
                            {{-- <form method="POST" action="{{ route('login') }}"> --}}
                                <form method="POST" action="{{ url('Social/guarda') }}" enctype="multipart/form-data" id="formulario-publicacion">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
            
                                            <div class="d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                                    <span class="symbol-label">
                                                        <img src="assets/media/svg/avatars/007-boy-2.svg"
                                                            class="h-75 align-self-end" alt="">
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Description-->
                                                <span class="text-muted font-weight-bold font-size-lg">{{
                                                    session()->get('user')->name }}</span>
                                                <!--end::Description-->
                                            </div>
                                        </div>
                                    </div>
                                    <h3>&nbsp;</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="radio-inline">
                                                    @foreach ($categorias as $c)
                                                    <label class="radio">
                                                        <input type="radio" @if($loop->first) checked="checked" @endif
                                                        name="categoria_id" value="{{ $c->id }}" />
                                                        <span></span>
                                                        {{ $c->nombre }}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="publicacion" class="form-control" rows="3"
                                                    placeholder="Escribe aqui" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="archivo" id="customFile_1"
                                                    onchange="showMyImage(this, 1)" required />
                                                <label class="custom-file-label" for="customFile">Elegir</label>
                                            </div>
                                            {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                                            <center>
                                                <img id="thumbnil_1" class="img-fluid" style="margin-top: 10px;" />
                                            </center>
                                            <button type="button" class="btn btn-danger mr-2 btn-block" id="btnRimg_1"
                                                style="display:none;" onclick="mueveImagen(1)">Quitar Imagen
                                            </button>
            
                                            <h3>&nbsp;</h3>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-success btn-block" onclick="guarda();">PUBLICAR</button>
                                        </div>
            
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-light-dark font-weight-bold btn-block"
                                                data-dismiss="modal">CERRAR</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- end modal registrar --}}
        

        <!--begin::Row-->
        <div class="row" data-sticky-container>
            {{-- @dd($publicaciones) --}}
            {{-- {{ session()->get('user')}} --}}

            {{-- lado izquierdo --}}
            
            <div class="col-md-3">

                <div class="card card-custom sticky" data-sticky="true" data-margin-top="90" data-sticky-for="1023"
                    data-sticky-class="stickyjs">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dark mb-5 p-5" role="alert">
                                <h4 class="alert-heading">AVISOS!</h4>
                                <p>Hoy habra una reunion, en la que se tratara de las modificaciones de los usuarios.</p>
                                <div class="border-bottom border-white opacity-20 mb-5"></div>
                                <p class="mb-0">6 de la tarde en oficinas.</p>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            CATEGORIAS
                                            <small></small>
                                        </h3>
                                    </div>
                                </div>
                            
                            
                                <div class="card-body">
                            
                                    <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-warning mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                            fill="#000000" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                            x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">INICIO</a>
                                            <span class="text-muted font-weight-bold"></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
                                        <!--end::Lable-->
                                    </div>
                            
                                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-9">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-danger mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">DESAPARECIDOS</a>
                                            <span class="text-muted font-weight-bold"></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-info rounded p-5">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-info mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                            fill="#000000" opacity="0.3"
                                                            transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
                                                        <path
                                                            d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                            fill="#000000"
                                                            transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
                                                        <path
                                                            d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                            fill="#000000" opacity="0.3"
                                                            transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
                                                        <path
                                                            d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                            fill="#000000" opacity="0.3"
                                                            transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">MASCOTAS</a>
                                            <span class="text-muted font-weight-bold"></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
                                        <!--end::Lable-->
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>

            {{-- fin lado izquierdo --}}

            {{-- centro --}}
            <div class="col-md-6">



                {{-- crea publicacion --}}
                <div class="row" data-sticky-container>
                    @if (session()->get('user'))

                        {{-- <a onclick="abre_modal()"> --}}
                        <div class="col-md-12">
                            <div class="card card-custom gutter-b">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Top-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-success mr-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/avatars/007-boy-2.svg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <span class="text-muted font-weight-bold font-size-lg">Que estas pensando, {{ session()->get('user')->name }}?</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Top-->
                                    <!--begin::Form-->
                                    <form id="kt_forms_widget_2_form" class="pt-10 ql-quil ql-quil-plain">
                                        <!--begin::Editor-->
                                        <input type="text" class="form-control" placeholder="Cuentanos que estas pensando..." onclick="abre_modal()">
                                        <!--end::Editor-->
                                        <div class="border-top my-5"></div>
                                        <!--end::Toolbar-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>      
                        {{-- </a>                         --}}
                    @else
                        <button class="btn btn-block btn-primary">Registrarse</button>
                        
                    @endif
                    

                </div>
                {{-- fin crea publicacion --}}
                <div id="publicacionesAjax">

                </div>
                <div class="row">
                   
                    <div class="col-md-12">
                        <!--begin::Forms Widget 4-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Top-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/avatars/047-girl-25.svg"
                                                class="h-75 align-self-end" alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Ruby
                                            Liam</a>
                                        <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span>
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip"
                                        title="Quick actions" data-placement="left">
                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Choose Label:</span>
                                                    <i class="flaticon2-information icon-md text-muted"
                                                        data-toggle="tooltip" data-placement="right"
                                                        title="Click to learn more..."></i>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-success">Customer</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-danger">Partner</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-warning">Suplier</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-primary">Member</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-dark">Staff</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator mt-3 opacity-70"></li>
                                                <li class="navi-footer py-4">
                                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Bottom-->
                                <div class="pt-4">
                                    <!--begin::Image-->
                                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                        style="background-image: url(assets/media/stock-900x600/3.jpg)"></div>
                                    <!--end::Image-->
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">Outlines keep you
                                        honest. They stop
                                        you from indulging in poorly thought-out metaphors about driving and keep you
                                        focused on the overall
                                        structure of your post</p>
                                    <!--end::Text-->
                                    <!--begin::Action-->
                                    <div class="d-flex align-items-center">
                                        <a href="#"
                                            class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2">
                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>24</a>
                                        <a href="#"
                                            class="btn btn-icon-danger btn-sm btn-text-dark-50 bg-hover-light-danger btn-hover-text-danger rounded font-weight-bolder font-size-sm p-2">
                                            <span class="svg-icon svg-icon-md svg-icon-danger pr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>75</a>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Bottom-->
                                <!--begin::Separator-->
                                <div class="separator separator-solid mt-2 mb-4"></div>
                                <!--end::Separator-->
                                <!--begin::Editor-->
                                <form class="position-relative">
                                    @csrf
                                    <textarea id="kt_forms_widget_4_input"
                                        class="form-control border-0 p-0 pr-10 resize-none" rows="1"
                                        placeholder="Reply..."></textarea>
                                    <div class="position-absolute top-0 right-0 mt-n1 mr-n2">
                                        <span class="btn btn-icon btn-sm btn-hover-icon-primary">
                                            <i class="flaticon2-clip-symbol icon-ms"></i>
                                        </span>
                                        <span class="btn btn-icon btn-sm btn-hover-icon-primary">
                                            <i class="flaticon2-pin icon-ms"></i>
                                        </span>
                                    </div>
                                </form>
                                <!--edit::Editor-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Forms Widget 4-->
                    </div>

                    <div class="col-md-12">

                    </div>
                </div>

            </div>

            {{-- fin centro --}}

            {{-- lado derecho --}}

            <div class="col-md-3">

                <div class="card card-custom sticky" data-sticky="true" data-margin-top="90" data-sticky-for="1023"
                    data-sticky-class="stickyjs">
                       <div class="alert mb-5 p-5" role="alert">
                            <h4 class="alert-heading">PUBLICIDAD</h4>
                            @php
                                 $fotos = App\Publicidad::all();
                                $cantFotos = App\Publicidad::count();
                                
                                $ran = rand(0,($cantFotos-1));

                                $arrayShow = array();

                                while(in_array($ran, $arrayShow)){
                                    $ran = rand(0,($cantFotos-1));
                                }
                                array_push($arrayShow,$ran);
                            @endphp
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-295px"
                                style="background-image: url({{ asset('img_publicidad/'.$fotos[$ran]->banner) }})">
                            </div>
                            @php
                                while(in_array($ran, $arrayShow)){
                                    $ran = rand(0,($cantFotos-1));
                                }
                                array_push($arrayShow,$ran);
                            @endphp
                            <br>
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-295px"
                                style="background-image: url({{ asset('img_publicidad/'.$fotos[$ran]->banner) }})">
                            </div>
                            @php                            
                                while(in_array($ran, $arrayShow)){
                                    $ran = rand(0,($cantFotos-1));
                                }
                                array_push($arrayShow,$ran);
                            @endphp
                            <br>
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-295px"
                                style="background-image: url({{ asset('img_publicidad/'.$fotos[$ran]->banner) }})">
                            </div>
                        </div>
                </div>
            </div>

               
            {{-- fin lado derecho --}}
        </div>

<!--end::Row-->

<!--end::Dashboard-->
</div>
<!--end::Container-->
</div>

@stop

@section('js')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*$(document).ready(function() {
        console.log( "ready!" );
    });*/

    $(function() {
        $("#publicacionesAjax").load("{{ url('Social/ajaxPublicaciones') }}");
    });

    function showMyImage(fileInput, numero) {

        var files = fileInput.files;
        $("#btnRimg_"+numero).show();
        // console.log(numero);
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

    function abre_modal(){
        // alert("en desarrollo :v");
        $('#modal-publicacion-articulos').modal('show');
    }

    function guarda()
    {
        if ($("#formulario-publicacion")[0].checkValidity()) {

            $("#formulario-publicacion").submit();
            Swal.fire("Excelente!", "Se guardo el patrimonio!", "success");
            $("#publicacionesAjax").load("{{ url('Social/ajaxPublicaciones') }}");
        }else{
            $("#formulario-publicacion")[0].reportValidity();
        }
    }

    function addComent(coment_id){
        // alert("en desarrollo :v");
        var coment = $('#kt_forms_widget_11_input'+coment_id).val();
        // alert(coment);
        $.ajax({
            url: "{{ url('Social/addComent') }}",
            data: {coment: coment,
                    publicacion_id: coment_id,    
            },
            type: 'GET',
            success: function(data) {
                $('#block-coments'+coment_id).html(data);
                $('#kt_forms_widget_11_input'+coment_id).val('')
            }
        });
    }

    

</script>
@endsection
