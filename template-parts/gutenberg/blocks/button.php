<?php
    $args = $args ?? null;

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

    $blockClass = $args ? $args['class'] . '__button button' : 'button';
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



<<?= $blockTypeLink ? $blockTypeLink : $blockType?> 
    <?= $dataAttributes ?>
    class="<?=$blockClass?>"
>
    <?php if($fields['hasLink'] && $fields['link']) : ?>
        <?= esc_html($fields['link']['title']) ?>
    <?php elseif(!$fields['hasLink'] && $fields['label']) : ?>
        <?= esc_html($fields['label']) ?>
    <?php endif; ?>
    <?php if($fields['icon_clone']) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/icon') ?>
    <?php endif; ?>
            
</<?=$blockType?>>