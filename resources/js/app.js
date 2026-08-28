import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import 'admin-lte';

import $ from 'jquery';
window.$ = window.jQuery = $;

$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.btn-like, .btn-dislike', function () {
        const $icon = $(this);
        const postId = $icon.data('post-id');
        const type = $icon.data('type');
        const $card = $icon.closest('.post-card');

        $.ajax({
            url: '/posts/' + postId + '/interact',
            method: 'POST',
            data: { type: type },
            dataType: 'json',
            success: function (response) {
                atualizarCard($card, response);
            },
            error: function (xhr) {
                console.error('Erro ao registrar interação:', xhr);
                alert('Não foi possível registrar sua reação. Tente novamente.');
            }
        });
    });

    function atualizarCard($card, data) {
        $card.find('.likes-count').text(data.likes);
        $card.find('.dislikes-count').text(data.dislikes);

        const $btnLike = $card.find('.btn-like');
        const $btnDislike = $card.find('.btn-dislike');

        $btnLike.removeClass('bi-heart-fill text-danger').addClass('bi-heart');
        $btnDislike.removeClass('bi-heartbreak-fill text-primary').addClass('bi-heartbreak');

        if (data.userReaction === 'Like') {
            $btnLike.removeClass('bi-heart').addClass('bi-heart-fill text-danger');
        } else if (data.userReaction === 'Deslike') {
            $btnDislike.removeClass('bi-heartbreak').addClass('bi-heartbreak-fill text-primary');
        }
    }
});