<?php
    // $args = $args ?? null;

    $fields = [
        'tag' => get_field('tag') ?? '',
        'title_clone' => get_field('title_clone') ?? null,
        'text_clone' => get_field('text_clone') ?? '',
        'button_clone' => get_field('button_clone') ?? null
    ];

    $blockClass = isset($args['blockClass']) ? $args['blockClass'] . '__headerText headerText' : 'headerText';
?>

 <article class="<?=$blockClass?>">
    <?php if(!empty($fields['tag'])) : ?>
        <div class="headerText__tag">
            <?= esc_html($fields['tag']) ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($fields['title_clone'])) : ?>
       <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass' => 'headerText']) ?>
    <?php endif; ?>
    <?php if(!empty($fields['text_clone'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass' => 'headerText']) ?>
    <?php endif; ?>
    <?php if(!empty($fields['button_clone'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass' => 'headerText']) ?>
    <?php endif ; ?>
</article>