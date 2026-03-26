<?php
    $author_id = get_post_field('post_author', get_the_ID());

    $fields = [
        'title' => get_field('title'),
        'text' => get_field('text'),
        'author' => [
            'name' => get_the_author_meta('display_name', $author_id),
            'company' => get_field('company', 'user_' . $author_id),
            'avatar' => get_field('avatar', 'user_' . $author_id),
        ]
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

    <?php if(!empty($fields['author'])) : ?>
        <div class="author-content__person avatar-testimonialCard">
            <?php if(!empty($fields['author']['avatar'])) : ?>
                <figure class="avatar-testimonialCard__image image">
                    <?= wp_get_attachment_image($fields['author']['avatar']['ID'], 'full', false, ['class'=>'']); ?>
                </figure>
            <?php endif; ?>

            <div class="avatar-testimonialCard__content">
                <?php if(!empty($fields['author']['name'])) : ?>
                    <span class="avatar-testimonialCard__name">
                        <?= esc_html($fields['author']['name']); ?>
                    </span>
                <?php endif; ?>
                <?php if(!empty($fields['author']['company'])) : ?>
                    <span class="avatar-testimonialCard__company">
                        <?= esc_html($fields['author']['company']); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</article>