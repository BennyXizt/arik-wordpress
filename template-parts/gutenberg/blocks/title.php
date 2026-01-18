<?php
    $args = $args ?? null;

    if($args) {
        $blockClass = isset($args['blockClass']) ? 'class="'.$args['blockClass'].'__title"' : '';

        $fields = [
            'title' => wp_kses($args['data']['title'] ?? '', [
                'span' => []
            ]) ?: get_the_title(),
            'type' => $args['data']['type'] ?? 'h2',
            'color' => $args['data']['color'] ?? ''
        ];
    } else {
        $blockClass = '';

        $fields = [
            'title' => wp_kses(get_field('title') ?? '', [
                'span' => []
            ]) ?: get_the_title(),
            'type' => get_field('type') ?? 'h2',
            'color' => get_field('color') ?? '',
        ];
    }

    

    $color = !empty($fields['color']) ? 'style="color: '. $fields['color'] .'"' : '';
?>

<?php if(!empty($fields['title'])) : ?>
    <<?=$fields['type']?> <?=$blockClass?> <?=$color?>>
        <?= $fields['title'] ?>
    </<?=$fields['type']?>>
<?php endif; ?>