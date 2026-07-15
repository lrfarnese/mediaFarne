
<div class="input-group mb-3">


    <div class="input-group-append">
        <div class="input-group-text">
              <span class="{{ $icon ??'' }}"></span>
        </div>
    </div>
    <input
    type="{{ $type ?? '' }}"
    class="form-control @error( $name ) is-invalid @enderror"
    name="{{ $name  ?? '' }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name) }}"
    >

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
