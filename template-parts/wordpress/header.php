<?php
    $locations = get_nav_menu_locations();
    $desktopMenuID = $locations['header_menu'];
    $desktopMenyButtonsID = $locations['header_buttons'];
    $desktopMenu = util_buildMenu(wp_get_nav_menu_items($desktopMenuID));
    $desktopMenuButtons = wp_get_nav_menu_items($desktopMenyButtonsID);
?>

<header class="header">
    <div class="header__container container">
        <div class="header__body">
            <?php util_displayLogo('header') ?>
            <div class="header__menu menu">
                <nav class="menu__body">
                    <?php util_generateMenus($desktopMenu)?>
                </nav>
            </div>
            <?php foreach($desktopMenuButtons as $button) : ?>
                <a href="<?=$button->url?>" class="header__button button button--size-small button--style-primary"
                >
                    <?=$button->title?>
                </a>
            <?php endforeach; ?>
            <button class="header__burger burger">
              <span></span>
            </button>
        </div>
    </div>
</header>