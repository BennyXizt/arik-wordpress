<?php 
    $locations = get_nav_menu_locations();
    $socialsID = $locations['socials'];
    $footerID = $locations['footer_menu'];
    $socials = wp_get_nav_menu_items($socialsID);
    $footerMenu = util_buildMenu(wp_get_nav_menu_items($footerID));

    function generateFooterMenu($menu, $class = 'body-footer', $dept = 0) {
        if(empty( $menu )) return;

        global $wp;
        $current_url = $wp->request;

        echo '<ul class="body-footer__list">';
        foreach($menu as $element) {
            echo "<li class='{$class}__item". ($element['children'] ? " {$class}__item--submenu submenu-{$dept}" : "") ."'>";
                echo '<article data-fsc-accordion data-fsc-accordion-behaviour="default" data-fsc-accordion-media-query="max-width: 767.98px" class="body-footer__accordion accordion">';
                    echo '<div data-fsc-accordion-summary class="accordion__top">';
                        echo '<h6 class="accordion__title">'. $element['item']->title .'</h6>';
                        echo '<svg class="accordion__icon">';
                            echo '<use href="'. get_template_directory_uri() .'/assets/media/icons/sprite.svg#ph_plus-light"></use>';
                        echo '</svg>';
                    echo '</div>';
                    echo '<ul data-fsc-accordion-body class="accordion__body">';
                    if($element['children']) {
                        foreach ($element['children'] as $child) {
                            $activeLinkPageClass = strtolower($current_url) === strtolower($child['item']->title) ? "menu__link menu__link--active" : '';
                            
                            echo '<li>';
                            echo '<a href = "'. esc_url($child['item']->url) .'" class="'. $activeLinkPageClass .'">'. esc_html($child['item']->title)  .'</a>';
                            echo '<li>';
                        }
                    }
                    echo '</ul>';
                echo '</article>';
            echo '</li>';
        }
        echo '</ul>';
    }

    $filteredCopyright = sanitize_key(wp_get_theme()->get('Name') . '_copyright_label');
    $filteredButtonLabel = sanitize_key(wp_get_theme()->get('Name') . '_copyright_button_label');
    $filteredButtonScroll = sanitize_key(wp_get_theme()->get('Name') . '_copyright_button_scroll');
    $filteredButtonFile = sanitize_key(wp_get_theme()->get('Name') . '_copyright_button_file');
    $filteredButtonIconName = sanitize_key(wp_get_theme()->get('Name') . '_copyright_button_icon_name');

    $buttonAttr = get_theme_mod($filteredButtonScroll) ? 
        'data-fsc-scroll data-fsc-scroll-to='. esc_html(get_theme_mod($filteredButtonScroll))  .' data-fsc-scroll-behaviour=smooth data-fsc-scroll-block=start' : 
        '';

    $fields = [
        'copyright' => get_theme_mod($filteredCopyright),
        'button' => [
            'label' => get_theme_mod($filteredButtonLabel),
            'icon' => [
                'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                'icon_name' => get_theme_mod($filteredButtonIconName),
                'rounded' => true
            ]
        ],
    ];
?>

<footer class="footer">
    <div class="footer__container container">
        <div class="footer__body body-footer">
            <div class="body-footer__content content-footer">
                <?php util_displayLogo('content-footer'); ?>
                <?php if(!empty($socials)) : ?>
                    <ul class="content-footer__social social social--vertical">
                        <?php foreach($socials as $social) : ?>
                            <li class="social__item">
                                <?php if(!empty($social->url)) : ?>
                                    <a href="<?= esc_url($social->url) ?>" class="social__link">
                                <?php endif; ?>
                                <?= util_getIcon($social->url); ?>
                                <?= $social->title ?>
                                <?php if(!empty($social->url)) : ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php if(!empty($footerMenu )) : ?>
                <?php generateFooterMenu($footerMenu); ?>
            <?php endif; ?>
        </div>
        <div class="footer__bottom bottom-footer">
            <?php if(!empty($fields['copyright'])) : ?>
                <div class="bottom-footer__copyright">
                    <?= esc_html($fields['copyright']) ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($fields['button'])) : ?>
                <button <?= esc_attr($buttonAttr) ?> class="bottom-footer__up button button--type-button-text">
                    <?= $fields['button']['label'] ?? esc_html($fields['button']['label']) ?>

                    <?php if(!empty($fields['button']['icon'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'bottom-footer', 'data'=>$fields['button']['icon']]) ?>
                    <?php endif; ?>
                </button>
            <?php endif; ?>
        </div>
    </div>
</footer>