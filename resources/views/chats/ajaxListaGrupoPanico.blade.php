<div class="d-flex align-items-center justify-content-between mb-1">
    <div class="d-flex align-items-center">
        <div class="symbol symbol-circle symbol-50 mr-3">
            {{-- <img alt="Pic" src="/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg" /> --}}
        </div>
        <input type="hidden" name="grupo_panico_id" id="grupo_panico_id" value="{{ $grupo->id }}">
        <div class="d-flex flex-column">
            <a type="button" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{ $grupo->nombre }}</a>
            {{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
        </div>
    </div>
    <div class="d-flex flex-column align-items-end">
        {{-- <span class="text-muted font-weight-bold font-size-sm">35 mins</span> --}}
    </div>
</div>