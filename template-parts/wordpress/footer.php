<?php 
    $locations = get_nav_menu_locations();
    $socialsID = $locations['socials'];
    $footerID = $locations['footer_menu'];
    $socials = wp_get_nav_menu_items($socialsID);
    $footerMenu = util_buildMenu(wp_get_nav_menu_items($footerID));

    function generateFooterMenu($menu, $class = 'body-footer', $dept = 0) {
        if(empty( $menu )) return;

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
                            echo '<li>'. $child['item']->title .'</li>';
                        }
                    }
                    echo '</ul>';
                echo '</article>';
            echo '</li>';
        }
        echo '</ul>';
    }
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
                <!-- <ul class="body-footer__list">
                    <?php foreach($footerMenu as $footer) : ?>
                        <li class="body-footer__item">
                            <article
                                data-fsc-accordion
                                data-fsc-accordion-behaviour="default"
                                data-fsc-accordion-media-query="max-width: 767.98px"
                                class="body-footer__accordion accordion"
                            >
                                <div data-fsc-accordion-summary class="accordion__top">
                                    <h6 class="accordion__title">Pages</h6>

                                    <svg class="accordion__icon">
                                        <use href="./assets/media/sprite.svg#ph_plus-light"></use>
                                    </svg>
                                </div>
                                <ul data-fsc-accordion-body class="accordion__body">
                                    <li>Home</li>

                                    <li>Services</li>

                                    <li>About</li>

                                    <li>Contact</li>
                                </ul>
                            </article>

                            <button class="button button--size-small button--style-primary">
                                More Templates

                                <svg class="icon">
                                <use
                                    href="./media/icons/sprite.svg#ph_arrow-up-right-light"
                                ></use>
                                </svg>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul> -->
            <?php endif; ?>
        </div>
        <div class="footer__bottom bottom-footer">
            <div class="bottom-footer__copyright">
                © 2022 Made by Pawel Gola. Powered by Framer..
            </div>

            <button
                data-fsc-scroll
                data-fsc-scroll-to="main"
                data-fsc-scroll-behaviour="smooth"
                data-fsc-scroll-block="start"
                class="bottom-footer__up button button--type-button-text"
            >
                To Top

                <div class="bottom-footer__icon-rounded icon-rounded">
                <svg class="icon-rounded__icon">
                    <use href="./media/icons/sprite.svg#ph_arrow-up-light"></use>
                </svg>
                </div>
            </button>
        </div>
    </div>
</footer>