<?php

    $locations = get_nav_menu_locations();
    $socialsID = $locations['socials'];
    $socials = wp_get_nav_menu_items($socialsID);

    $data = [
        'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg'
    ];
?>

<?php if(!empty($socials)) : ?>
    <ul class="content-singleblog__social social social--button" data-fsc-watcher data-fsc-watcher-once>
        <?php foreach($socials as $social) : ?>
            <li class="social__item">
                <?php if(!empty($social->url)) : ?>
                    <a href="<?= esc_url($social->url) ?>" class="social__link">
                <?php endif; ?>
                <?= util_getIcon($social->url, $data); ?>
                <span class="social__label"><?= $social->title ?></span>
                <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social__link-arrow icon','data'=>[
                    'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                    'icon_name' => 'ph_arrow-up-right-light'
                ]]) ?>
                <?php if(!empty($social->url)) : ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>