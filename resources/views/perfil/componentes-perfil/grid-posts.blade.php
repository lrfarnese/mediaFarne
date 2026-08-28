@vite('resources/css/css-perfil.css')

{{-- ===== GRID ===== --}}
<div class="grid-posts mb-4">
    @forelse ($user->posts as $post)
        <div
            class="grid-post-thumb"
            data-bs-toggle="modal"
            data-bs-target="#postModal{{ $post->id }}"
            role="button"
            aria-label="Ver publicação de {{ $post->user->username }}"
        >
            <div class="thumb-bg">
                {{-- Corrigido: Removido o parêntese extra no final do @if --}}
                @if($post->images->isNotEmpty())
                    <img src="{{ asset('storage/'. $post->images->first()->url) }}"
                         style="width:100%; height:100%; object-fit:cover; display:block;">
                @endif
            </div>
        </div>
    @empty
        {{-- Mensagem caso não haja posts --}}
        <div class="w-100 text-center py-5">
            <p class="text-muted mb-0">Nenhuma publicação por enquanto.</p>
        </div>
    @endforelse
</div>

{{-- ===== MODAIS ===== --}}
@foreach ($user->posts as $post)
    <div
        class="modal fade modal-post"
        id="postModal{{ $post->id }}"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative">


                    <div class="position-absolute top-0 end-0 m-2 z-1 d-flex gap-2 align-items-center">

                        @if(auth()->check() && auth()->id() === $post->user->id)

                            <form action="{{route('posts.destroy', encrypt($post->id))}}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta publicação?');"
                                  class="m-0"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm d-flex align-items-center justify-content-center shadow-sm"
                                    style="border-radius: 50%; width: 30px; height: 30px; padding: 0;"
                                    title="Excluir publicação"
                                >
                                    <i class="bi bi-trash3-fill" style="font-size: 0.85rem;"></i>
                                </button>
                            </form>
                        @endif

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Fechar"
                            style="background-color: rgba(255,255,255,0.8); border-radius: 50%; padding: 6px; margin: 0;"
                        ></button>
                    </div>

                    <x-post-card
                        :username="$post->user->username"
                        :fotoPerfil="$post->user->url_foto_perfil"
                        :postId="$post->id"
                        :id="encrypt($post->user->id)"
                        :likes="$post->likes->count()"
                        :deslikes="$post->dislikes->count()"
                        :legenda="$post->content"
                        :imageUrl="$post->images->isNotEmpty() ? asset('storage/' . $post->images->first()->url) : null"
                        :date="$post->created_at"
                        :userReaction="$post->interactions->first()?->type"
                    />
                </div>
            </div>
        </div>
    </div>
@endforeach
