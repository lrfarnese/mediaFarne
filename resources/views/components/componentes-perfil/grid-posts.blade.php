@vite('resources/css/css-perfil.css')
@php
$posts = [
    ['id' => 1, 'username' => 'ana.silva', 'likes' => 142, 'deslikes' => 3,  'legenda' => 'Uma tarde incrível no parque! 🌿',               'imageUrl' => 'https://picsum.photos/seed/post1/600/600', 'date' => '2 dias atrás'],
    ['id' => 2, 'username' => 'ana.silva', 'likes' => 89,  'deslikes' => 1,  'legenda' => 'Novo projeto saindo do forno 🔥',                 'imageColor' => '#f9c784', 'date' => '5 dias atrás'],
    ['id' => 3, 'username' => 'ana.silva', 'likes' => 210, 'deslikes' => 5,  'legenda' => 'Domingo é dia de descanso ☕',                    'imageColor' => '#c9b8e8', 'date' => '1 semana atrás'],
    ['id' => 4, 'username' => 'ana.silva', 'likes' => 55,  'deslikes' => 0,  'legenda' => 'Explorando novos lugares 🗺️',                     'imageColor' => '#b8e8c9', 'date' => '1 semana atrás'],
    ['id' => 5, 'username' => 'ana.silva', 'likes' => 320, 'deslikes' => 12, 'legenda' => 'A vida é bela quando você curte o processo 💫',   'imageColor' => '#f4a9a8', 'date' => '2 semanas atrás'],
    ['id' => 6, 'username' => 'ana.silva', 'likes' => 76,  'deslikes' => 2,  'legenda' => 'Mais um registro especial 📸',                    'imageColor' => '#ffd6a5', 'date' => '3 semanas atrás'],
    ['id' => 7, 'username' => 'ana.silva', 'likes' => 198, 'deslikes' => 4,  'legenda' => 'Momentos assim são pra guardar ✨',               'imageColor' => '#caffbf', 'date' => '1 mês atrás'],
    ['id' => 8, 'username' => 'ana.silva', 'likes' => 44,  'deslikes' => 0,  'legenda' => 'Simples assim 🌸',                                'imageColor' => '#fdffb6', 'date' => '1 mês atrás'],
    ['id' => 9, 'username' => 'ana.silva', 'likes' => 133, 'deslikes' => 7,  'legenda' => 'Cada detalhe conta 🎨',                          'imageColor' => '#9bf6ff', 'date' => '1 mês atrás'],
];
@endphp

{{-- ===== GRID ===== --}}
<div class="grid-posts mb-4">
    @foreach ($posts as $post)
        <div
            class="grid-post-thumb"
            data-bs-toggle="modal"
            data-bs-target="#postModal{{ $post['id'] }}"
            role="button"
            aria-label="Ver publicação de {{ $post['username'] }}"
        >
            <div class="thumb-bg" style="background-color: {{ $post['imageColor'] ?? 'transparent' }};">
                @if(!empty($post['imageUrl'] ?? null))
                    <img src="{{ $post['imageUrl'] }}"
                         style="width:100%; height:100%; object-fit:cover; display:block;">
                @endif
            </div>
        </div>
    @endforeach
</div>

{{-- ===== MODAIS ===== --}}
@foreach ($posts as $post)
    <div
        class="modal fade modal-post"
        id="postModal{{ $post['id'] }}"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button
                        type="button"
                        class="btn-close position-absolute top-0 end-0 m-2 z-1"
                        data-bs-dismiss="modal"
                        aria-label="Fechar"
                        style="background-color: rgba(255,255,255,0.8); border-radius: 50%; padding: 6px;"
                    ></button>

                    <x-post-card
                        :username="$post['username']"
                        :likes="$post['likes']"
                        :deslikes="$post['deslikes']"
                        :legenda="$post['legenda']"
                        :imageColor="$post['imageColor'] ?? 'transparent'"
                        :imageUrl="$post['imageUrl'] ?? null"
                        :date="$post['date']"
                    />
                </div>
            </div>
        </div>
    </div>
@endforeach