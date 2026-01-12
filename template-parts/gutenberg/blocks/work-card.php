<?php
    $args = $args ?? null;

    if($args) {
        $fields = [
            'noise' => $args['data']['noise'],
            'icon_clone' => $args['data']['icon_clone'],
            'image' => $args['data']['image'],
            'title_clone' => $args['data']['title_clone'],
            'link' => $args['data']['link'],
        ];
    }
    else {
        $fields = [
            'noise' => get_field('noise'),
            'icon_clone' => get_field('icon_clone'),
            'image' => get_field('image'),
            'title_clone' => get_field('title_clone'),
            'link' => get_field('link'),
        ];
    }

    $url = !empty($fields['link']['url']) ? 'href="'. esc_url($fields['link']['url']) .'"' : '';
    $target = !empty($fields['link']['target']) ? 'target="'. esc_attr($fields['link']['target']) .'"' : '';
    $blockTypeLink = "a {$url} {$target}";

?>

<div class="workCard">
    <div class="workCard__background">
        <?php if(!empty($fields['noise'])) : ?>
            <figure class="workCard__noise image">
                <?php echo wp_get_attachment_image($fields['noise']['ID'], 'full', false, ['class'=>'']) ; ?>
            </figure>
        <?php endif; ?>
        <?php if(!empty($fields['icon_clone'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'workCard', 'data'=>$fields['icon_clone']]); ?>
        <?php endif; ?>
        <?php if(!empty($fields['image'])) : ?>
            <figure class="workCard__image image">
                <?php echo wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']) ; ?>
            </figure>
        <?php endif; ?>
    </div>
    <div class="workCard__content">
        <?php if(!empty($fields['title_clone'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'workCard', 'data'=>$fields['title_clone']]) ?>
        <?php endif; ?>
        <?php if(isset($fields['link']['title'])) : ?>
            <a <?= $url . ' ' . $target ?>>
                <span class="workCard__text">
                    <?= esc_html($fields['link']['title']); ?>
                </span>
            </a>
        <?php endif; ?>
    </div>
</div>