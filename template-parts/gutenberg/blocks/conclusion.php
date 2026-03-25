<?php
    $fields = [
        'title' => get_field('title'),
        'text' => get_field('text'),
    ]
?>

<article class="content-singleblog__author author-content">
    <div class="author-content__body">
        <?php if(!empty($fields['title'])) : ?>
            <h3 class="author-content__title">
                <?= esc_html($fields['title']); ?>
            </h3>
        <?php endif; ?>
        <?php if(!empty($fields['text'])) : ?>
            <div class="author-content__text text">
                <p>
                    <?= esc_html($fields['text']); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <div class="author-content__person avatar-testimonialCard">
        <figure class="avatar-testimonialCard__image image">
            <img src="media/image/clients/client7.png" />
        </figure>

        <div class="avatar-testimonialCard__content">
            <span class="avatar-testimonialCard__name">
                <?= esc_html(the_author()); ?>
            </span>
            <span class="avatar-testimonialCard__company">
            Framer Expert
            </span>
        </div>
    </div>
</article>