<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createPostModalLabel">Criar nova publicação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Escolha uma foto</label>
                        <input type="file" class="form-control" id="postImage">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Legenda</label>
                        <textarea class="form-control" rows="3" placeholder="Escreva uma legenda..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary px-4">Compartilhar</button>
            </div>
        </div>
    </div>
</div>