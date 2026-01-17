<?php
    $args = $args ?? null;

    if($args) {
        $id = $args['data']->ID;
        $background = get_field('background', $id) ?: [];
        $terms = get_the_terms($id, 'work_category');
        $term = $terms[0] ?? [];

        $fields = [
            'title' => get_the_title($id),
            'image' => get_post_thumbnail_id($id),
            'link' => get_permalink($id),
            'background' => $background,
            'icon' => $background['icon'] ?? null,
            'noise' => $background['noise'] ?? null,
            'term' => $term,
            'termLink' => isset($term->term_id) ? get_term_link($term->term_id) : null
        ];
    }
?>

<div class="workCard">
    <div class="workCard__background">
        <?php if(!empty($fields['link'])) : ?>
            <a href="<?= esc_url($fields['link']) ?>">
        <?php endif; ?>
            <?php if(!empty($fields['noise'])) : ?>
                <figure class="workCard__noise image">
                    <?php echo wp_get_attachment_image($fields['noise']['ID'], 'full', false, ['class'=>'']) ; ?>
                </figure>
            <?php endif; ?>
            <?php if(!empty($fields['icon'])) : ?>
                <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'workCard', 'data'=>$fields['icon']]); ?>
            <?php endif; ?>
            <?php if(!empty($fields['image'])) : ?>
                <figure class="workCard__image image">
                    <?php echo wp_get_attachment_image($fields['image'], 'full', false, ['class'=>'']) ; ?>
                </figure>
            <?php endif; ?>
        <?php if(!empty($fields['link'])) : ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="workCard__content">
        <?php if(!empty($fields['title'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'workCard', 'data'=> [
                'title' => $fields['title'],
                'type' => 'h4'
            ]]) ?>
        <?php endif; ?>
        <?php if(!empty($fields['termLink'])) : ?>
            <a href="<?= esc_url($fields['termLink']) ?>">
        <?php endif; ?>
        <?php if(!empty($fields['term'])) : ?>
            <span class="workCard__text">
                <?= $fields['term']->name ?>
            </span>
        <?php endif; ?>
        <?php if(!empty($fields['termLink'])) : ?>
            </a>
        <?php endif; ?>
    </div>
</div>