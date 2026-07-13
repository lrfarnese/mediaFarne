@props([
    'username', 
    'likes', 
    'deslikes' => 0, 
    'legenda', 
    'imageUrl' => null,
    'date'
])

<div class="card border-1 mb-4 shadow-sm" style="border-radius: 8px; overflow: hidden; background-color: #fff;">
    <div class="d-flex align-items-center p-3">
        <div class="rounded-circle bg-secondary-subtle me-2" style="width: 32px; height: 32px;"></div>
        <span class="fw-bold" style="font-size: 14px;">{{ $username }}</span>
    </div>

    <div style="aspect-ratio: 1/1;">
        @if($imageUrl)
            <img src="{{ $imageUrl }}" class="w-100 h-100 object-fit-cover">
        @endif
    </div>

    <div class="p-3">
        <div class="d-flex align-items-center mb-2">
            <div class="d-flex align-items-center me-4">
                <i class="bi bi-heart fs-5 me-2" style="cursor: pointer;"></i>
                <span class="fw-bold" style="font-size: 14px;">{{ $likes }}</span>
            </div>

            <div class="d-flex align-items-center">
                <i class="bi bi-heartbreak fs-5 me-2" style="cursor: pointer;"></i>
                <span class="fw-bold" style="font-size: 14px;">{{ $deslikes }}</span>
            </div>
        </div>

        <div style="font-size: 14px;">
            <span class="fw-bold">{{ $username }}</span> {{ $legenda }}
        </div>

        <div class="mt-2 text-muted text-uppercase" style="font-size: 10px; letter-spacing: 0.2px;">
            {{ $date }}
        </div>
    </div>
</div>