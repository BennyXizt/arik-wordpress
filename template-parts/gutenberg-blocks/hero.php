<?php

    $allowed_title_tags = [
        'span' => []
    ];
    $fields = [
        'title' => wp_kses(get_field('title'), $allowed_title_tags),
        'tag' => get_field('tag'),
        'type' => get_field('type'),
        'text' => get_field('text'),
    ];

    $has_content = array_filter($fields);
?>

<article class="headerText">
    <?php if($fields['tag']) : ?>
        <div class="headerText__tag">
            <?= esc_html($fields['tag']) ?>
        </div>
    <?php endif; ?>
    <?php if($fields['title']) : ?>
        <<?=$fields['type']?> class="headerText__title">
            <?= $fields['title'] ?>
        </<?=$fields['type']?>>
    <?php endif; ?>
    <?php if($fields['text']) : ?>
        <div class="text">
            <?= $fields['text']?>
        </div>
    <?php endif; ?>

    <InnerBlocks />
</article>