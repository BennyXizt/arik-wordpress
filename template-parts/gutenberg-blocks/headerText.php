<?php
   $allowed_title_tags = [
        'span' => []
    ];
    $fields = [
        'tag' => get_field('tag'),
        'title' => wp_kses(get_field('title'), $allowed_title_tags),
        'type' => get_field('title_type') ?? 'h2',
        'title_color' => get_field('title_color'),
        'text' => get_field('text'),
    ];

    $title_color = $fields['title_color'] ? 'style="color: '. $fields['title_color'] .'"' : '';

?>

 <article class="headerText">
    <?php if($fields['tag']) : ?>
        <div class="headerText__tag">
            <?= esc_html($fields['tag']) ?>
        </div>
    <?php endif; ?>
    <?php if($fields['title']) : ?>
        <<?=$fields['type']?> class="headerText__title" <?=$title_color ?>>
            <?= $fields['title'] ?>
        </<?=$fields['type']?>>
    <?php endif; ?>
    <?php if($fields['text']) : ?>
        <div class="text">
            <?= wp_kses_post($fields['text']) ?>
        </div>
    <?php endif; ?>
</article>