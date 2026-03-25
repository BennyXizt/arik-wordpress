<?php
    $args = $args ?? null;

    if($args) {
        $blockClass = isset($args['blockClass']) ? 'class="'.$args['blockClass'].'__title"' : '';
        $title = '';
        if(!empty($args['data']['title'] && $args['data']['title'] !== null)) {
            $title = wp_kses($args['data']['title'] ?? '', [
                'span' => [],
                'br' => []
            ]) ?: get_the_title();
        }

        $fields = [
            'title' => $title,
            'type' => $args['data']['type'] ?: 'h2',
            'color' => $args['data']['color'] ?? '',
            'dataAttribute' => $args['data']['dataAttribute'] ?? ''
        ];
    } else {
        $blockClass = '';

        $fields = [
            'title' => wp_kses(get_field('title') ?? '', [
                'span' => []
            ]) ?: get_the_title(),
            'type' => get_field('type') ?: 'h2',
            'color' => get_field('color') ?? '',
            'dataAttribute' => get_field('dataAttribute') ?? ''
        ];
    }

    $color = !empty($fields['color']) ? 'style="color: '. $fields['color'] .'"' : '';
?>

<?php if(!empty($fields['title'])) : ?>
    <<?=$fields['type']?> <?=$blockClass?> <?=$fields['dataAttribute']?> <?=$color?>>
        <?= $fields['title'] ?>
    </<?=$fields['type']?>>
<?php endif; ?>