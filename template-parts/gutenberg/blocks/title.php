<?php
    $fields = [
        'title' => wp_kses(get_field('title'), [
            'span' => []
        ]) ?? null,
        'type' => get_field('title_type') ?? 'h2',
        'color' => get_field('color') ?? '',
    ];

    $title_color = !empty($fields['color']) ? 'style="color: '. $fields['color'] .'"' : '';

?>

<?php if(!empty($fields['title'])) : ?>
    <<?=$fields['type']?> class="headerText__title" <?=$title_color ?>>
        <?= $fields['title'] ?>
    </<?=$fields['type']?>>
<?php endif; ?>