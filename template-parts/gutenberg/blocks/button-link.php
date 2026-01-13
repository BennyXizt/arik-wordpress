<?php
    $args = $args ?? null;

    if($args) {
        $blockClass = isset($args['blockClass']) ? $args['blockClass'] . '__button button' : 'button';

        $fields = [
            'hasLink' => isset($args['data']['block_type']) ? $args['data']['block_type'] === 'link' : null,
            'label' => $args['data']['label'] ?? null,
            'link' => isset($args['data']['link']) && is_array($args['data']['link']) ? $args['data']['link'] : [],
            'scroll' => $args['data']['scroll'] ?? null,
            'size' => $args['data']['size'] ?? null,
            'style' => $args['data']['style'] ?? null,
            'type' => $args['data']['type'] ?? null,
            'icon_clone' => $args['data']['icon_clone'] ?? null
        ];
    }
    else {
        $blockClass = 'button';

        $fields = [
            'hasLink' => get_field('block_type') === 'link',
            'label' => get_field('label') ?? null,
            'link' => is_array(get_field('link')) ? get_field('link') : [],
            'scroll' => get_field('scroll') ?? null,
            'size' => get_field('size') ?? null,
            'style' => get_field('style') ?? null,
            'type' => get_field('type') ?? null,
            'icon_clone' => get_field('icon_clone') ?? null
        ];
    }

    

    
    $blockSizes = ['small'=>'button--size-small'];
    $blockStyles = ['primary'=>'button--style-primary'];
    $blockTypes = ['button-text'=>'button--type-button-text'];

    if(isset($blockSizes[$fields['size']])) {
        $blockClass .= ' ' . $blockSizes[$fields['size']];
    }
    if(isset($blockStyles[$fields['style']])) {
        $blockClass .= ' ' .$blockStyles[$fields['style']];
    }
    if(isset($blockTypes[$fields['type']])) {
        $blockClass .= ' ' .$blockTypes[$fields['type']];
    }

    $dataAttributes = $fields['scroll'] ? 
        'data-fsc-scroll data-fsc-scroll-to="'. esc_html($fields['scroll'])  .'" data-fsc-scroll-behaviour="smooth" data-fsc-scroll-block="end"' : '';

    $blockType = $fields['hasLink'] ? 'a' : 'button';
    $blockTypeLink = null;

    if($blockType === 'a') {
        $url = !empty($fields['link']['url']) ? 'href="'. esc_url($fields['link']['url']) .'"' : '';
        $target = !empty($fields['link']['target']) ? 'target="'. esc_attr($fields['link']['target']) .'"' : '';
        $blockTypeLink = "a {$url} {$target}";
    }
?>


<?php if(!empty($fields['label']) || !empty($fields['hasLink']) || !empty($fields['icon_clone']['file'])) : ?>
    <<?= $blockTypeLink ? $blockTypeLink : $blockType?> 
        <?= $dataAttributes ?>
        class="<?=$blockClass?>"
    >
        <?php if($fields['hasLink'] && !empty($fields['link'])) : ?>
            <?= esc_html($fields['link']['title']) ?>
        <?php elseif(!$fields['hasLink'] && !empty($fields['label'])) : ?>
            <?= esc_html($fields['label']) ?>
        <?php endif; ?>
        <?php if(!empty($fields['icon_clone'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['data'=>$fields['icon_clone']]) ?>
        <?php endif; ?>
    </<?=$blockType?>>
<?php endif; ?>