<?php
    $fields = [
        'image' => get_field('image'),
        'headertext' => get_field('headertext'),
        'aboutblock' => get_field('aboutblock'),
        'awards' => get_field('awards'),
    ];

    $locations = get_nav_menu_locations();
    $socialsID = $locations['socials'];
    $socials = wp_get_nav_menu_items($socialsID);
?>

<section class="layout__hero-about hero-about">
    <div class="hero-about__container container">
        <?php if(!empty($fields['image'])) : ?>
            <figure class="hero-about__picture image">
                <?= wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']);?>
            </figure>
        <?php endif; ?>

        <div class="hero-about__body">
            <?php if(!empty($fields['headertext'])) : ?>
                <?php get_template_part('template-parts/gutenberg/blocks/header-text', null, ['blockClass'=>'hero-about', 'data'=>$fields['headertext']]) ?>
            <?php endif; ?>

            <?php if(!empty($fields['aboutblock'])) : ?>
                <article class="hero-about__content-about content-about">
                    <?php if(!empty($fields['aboutblock']['tag'])) : ?>
                        <span class="content-about__tag"> 
                            <?= esc_html($fields['aboutblock']['tag']) ?>    
                        </span>
                    <?php endif;    ?>
                    <?php if(!empty($fields['aboutblock']['title'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'content-about', 'data'=>$fields['aboutblock']['title']]) ?>
                    <?php endif; ?>
                    <?php if(!empty($fields['aboutblock']['text'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'content-about_', 'data'=>$fields['aboutblock']['text']]) ?>
                    <?php endif; ?>
                    <?php if(!empty($fields['aboutblock']['image'])) : ?>
                        <div class="content-about__picture">
                            <figure class="content-about__noise image">
                                <img src="<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png' ?>" />
                            </figure>

                            <figure class="content-about__image image">
                                <?= wp_get_attachment_image($fields['aboutblock']['image']['ID'], 'full', false, ['class'=>'']); ?>
                            </figure>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endif; ?>

            <?php if(!empty($socials)) :
                $data = [
                    'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg'
                ];
            ?>
                <ul class="hero-about__social social social--button">
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

            <?php if(!empty($fields['awards'])) : ?>
                 <article class="about__awards awards-about">
                    <?php if(!empty($fields['awards']['title'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'awards-about', 'data'=>$fields['awards']['title']]) ?>
                    <?php endif; ?>
                    <?php if(!empty($fields['awards']['list'])) : ?>
                        <table class="awards-about__table">
                            <?php foreach($fields['awards']['list'] as $award) : ?>
                                <tr class="awards-about__line">
                                    <?php if(!empty($award['label'])) : ?>
                                        <td class="awards-about__label">
                                            <?= esc_html($award['label']) ?>
                                        </td>
                                    <?php endif; ?>
                                    <?php if(!empty($award['year'])) : ?>
                                        <td class="awards-about__year">
                                            <?= esc_html($award['year']) ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </article>
            <?php endif; ?>
           
        </div>
    </div>
</section>