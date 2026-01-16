<?php

 function util_buildMenu($menuItems, $parentID = 0) {
    $buffer = [];

    if(empty( $menuItems )) return;

    foreach($menuItems as $item) {
        if((int)$item->menu_item_parent === $parentID) {
            $children = util_buildMenu($menuItems, (int)$item->ID);

            $buffer[] = [
                'item' => $item,
                'children' => $children
            ];
        }
    }

    return $buffer;
}
function util_generateMenus($menu, $class = 'menu', $dept = 0) {
    if(empty( $menu )) return;

    echo "<ul class='". ($dept > 0 ? "{$class}" : "{$class}__list") ."'>";
    foreach($menu as $element) {
        echo "<li class='{$class}__item". ($element['children'] ? " {$class}__item--submenu submenu-{$dept}" : "") ."'>";
            if($element['item']->url !== '#') {
                echo "<a href='{$element['item']->url}' class='{$class}__link'>";
                    echo $element['item']->title;
                echo '</a>';
            }
            else {
                echo "<div class='{$class}__link'>";
                    echo $element['item']->title;
                echo '</div>';
            }
            
            if($element['children']) {
                util_generateMenus($element['children'], 'submenu', $dept + 1);
            }
        echo '</li>';
    }
    echo '</ul>';
}
 function util_getIcon($url) {
    $data = [
        'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
        'rounded' => true,
        'size' => '38'
    ];

    switch (true) {
        case str_contains($url, 'instagram'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_instagram-logo-light',
            ])]);
        }

        case str_contains($url, 'behance'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_behance-logo-light',
            ])]);
        }

        case str_contains($url, 'dribbble'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_dribbble-logo-light',
            ])]);
        }

        case str_contains($url, 'pinterest'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_pinterest-logo-light',
            ])]);
        }
        
        case str_contains($url, 'tiktok'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_tiktok-logo-light',
            ])]);
        }

        case str_contains($url, 'twitch'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_twitch-logo-light',
            ])]);
        }

        case str_contains($url, 'x.com'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_twitter-logo-light',
            ])]);
        }

        case str_contains($url, 'whatsapp'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_whatsapp-logo-light',
            ])]);
        }

        case str_contains($url, 'youtube'): {
            return get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social', 
            'data'=> array_merge($data, [
                'icon_name' => 'ph_youtube-logo-light',
            ])]);
        }
    }
}