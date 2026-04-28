<div class="d-flex align-items-center gap-4 mb-3 flex-wrap">

    {{-- Avatar --}}
    <div class="rounded-circle bg-black d-flex align-items-center justify-content-center flex-shrink-0"
        style="width:90px; height:90px;">
    </div>

    {{-- Nome + stats --}}
    <div class="flex-grow-1">
        <h5 class="fw-bold mb-0">Lucas Farnese</h5>
        <span class="text-muted small">@Farnesinho</span>

        <div class="d-flex align-items-center gap-3 mt-3 flex-wrap">
            <div class="text-center">
                <div class="fw-bold">42</div>
                <div class="text-muted small">Posts</div>
            </div>

            <div class="vr"></div>
            <div class="text-center">
                <a href="{{ route('perfil.seguidores') }}" class="text-decoration-none text-dark">
                    <div class="fw-bold">1,2K</div>
                    <div class="text-muted small">Seguidores</div>
                </a>
                
            </div>
            
            <div class="vr"></div>
            <div class="text-center">
                <a href="{{ route('perfil.seguindo')}}" class="text-decoration-none text-dark">
                    <div class="fw-bold">180</div>
                    <div class="text-muted small">Seguindo</div>
                </a>
                
            </div>
        </div>
    </div>
</div>