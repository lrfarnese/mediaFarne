<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createPostModalLabel">Criar nova publicação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.componentes-login.input',[
                        'placeholder' => 'Foto',
                        'type' => 'file',
                        'name' =>'postImage',
                        'icon'=> 'bi bi-file'
                    ])
                    <div class="mb-3">
                        <label class="form-label">Legenda</label>
                        <textarea class="form-control @error( 'legenda' ) is-invalid @enderror"
                                  name="legenda"
                        >
                        </textarea>
                        @error('legenda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary px-4">Compartilhar</button>
                    <input type="hidden" name="_modal" value="createPostModal">
                </form>
            </div>

        </div>
    </div>
</div>


