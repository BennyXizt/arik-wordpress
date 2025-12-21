<?php
   $allowed_title_tags = [
        'span' => []
    ];
    $fields = [
        'tag' => get_field('tag') ?? '',
        'title' => wp_kses(get_field('title'), $allowed_title_tags),
        'type' => get_field('title_type') ?? 'h2',
        'title_color' => get_field('title_color') ?? '',
        'text' => get_field('text') ?? '',
        'text_color' => get_field('text_color') ?? '',
        'text_size' => get_field('text_size') ?? 'default',
        'button_clone' => get_field('button_clone') ?? null
    ];

    $text_class = 'headerText__text text';
    $text_sizes = ['12', '14', '18', '20', '24'];
    if($fields['text_size'] !== 'default' && in_array($fields['text_size'], $text_sizes)) {
        $text_class .= " text--size-{$fields['text_size']}";
    }

    $title_color = $fields['title_color'] ? 'style="color: '. $fields['title_color'] .'"' : '';
    $text_color = $fields['text_color'] ? 'style="color: '. $fields['text_color'] .'"' : '';
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
        <div class="<?=$text_class?>" <?=$text_color ?>>
            <?= wp_kses_post($fields['text']) ?>
        </div>
    <?php endif; ?>
    <?php if($fields['button_clone']) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/button', null, ['class' => 'headerText']) ?>
    <?php endif ; ?>
</article>