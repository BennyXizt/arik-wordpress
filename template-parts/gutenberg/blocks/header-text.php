<?php
    $args = $args ?? null;

    if($args) {
        $fields = [
            'tag' => $args['data']['tag'] ?? '',
            'title_clone' => $args['data']['title_clone'] ?? null,
            'text_clone' => $args['data']['text_clone'] ?? '',
            'button_clone' => $args['data']['button_clone'] ?? null
        ];
    }
    else {
        $fields = [
            'tag' => get_field('tag') ?? '',
            'title_clone' => get_field('title_clone') ?? null,
            'text_clone' => get_field('text_clone') ?? '',
            'button_clone' => get_field('button_clone') ?? null
        ];
    }

    

    $blockClass = isset($args['blockClass']) ? $args['blockClass'] . '__headerText headerText' : 'headerText';
?>

 <article class="<?=$blockClass?>">
    <?php if(!empty($fields['tag'])) : ?>
        <div class="headerText__tag">
            <?= esc_html($fields['tag']) ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($fields['title_clone'])) : ?>
       <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass' => 'headerText', 'data'=>$fields['title_clone']]) ?>
    <?php endif; ?>
    <?php if(!empty($fields['text_clone'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass' => 'headerText', 'data'=>$fields['text_clone']]) ?>
    <?php endif; ?>
    <?php if(!empty($fields['button_clone'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass' => 'headerText', 'data'=>$fields['button_clone']]) ?>
    <?php endif ; ?>
</article>