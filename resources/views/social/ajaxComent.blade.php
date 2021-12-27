@foreach ($coments as $co)
    <div class="d-flex pt-5">
        <!--begin::Symbol-->
        <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
            <span class="symbol-label">
                <img src="assets/media/svg/avatars/009-boy-4.svg" class="h-75 align-self-end" alt="">
            </span>
        </div>
        <!--end::Symbol-->
        <!--begin::Info-->
        {{-- @dd($co->usuarios) --}}
        <div class="d-flex flex-column flex-row-fluid">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap">
                <a href="#"
                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{ $co->usuario->name }}</a>
                <span class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{ $co->created_at }}</span>
                {{--  <span class="text-muted font-weight-normal font-size-sm">Edit</span>  --}}
                @if (session()->get('user')->id == $co->user_id)
                    <button class="btn" onclick="editComent('{{ $co->publicacion_id }}','{{ $co->id }}','{{ $co->comentario }}')"><span class="text-muted font-weight-normal font-size-sm">Edit</span></button>
                @endif
            </div>
            <span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $co->comentario }}</span>
            <!--end::Info-->
        </div>
        <!--end::Info-->
    </div>
@endforeach

