<?php
    $fields = [
        'image' => get_field('image'),
        'left_label' => get_field('left_label'),
        'right_label' => get_field('right_label'),
        'title_clone' => get_field('title'),
        'text_clone' => get_field('text'),
    ];

    $locations = get_nav_menu_locations();
    $socialsID = $locations['socials'];
    $socials = wp_get_nav_menu_items($socialsID);
?>

<section class="layout__about about">
    <article class="about__top top-about">
        <?php if(!empty($fields['left_label'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'top-about', 'data'=>$fields['left_label']]) ?>
        <?php endif; ?>
        <?php if(!empty($fields['image'])) : ?>
            <figure class="top-about__image image">
                <?= wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']); ?>
            </figure>
        <?php endif; ?>
        <?php if(!empty($fields['right_label'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'top-about', 'data'=>$fields['right_label']]) ?>
        <?php endif; ?>
    </article>
    <div class="about__container container">
    <article class="about__wrapper wrapper-about">
        <?php if(!empty($fields['title_clone'])) : ?>
            <div class="wrapper-about__left">
                <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'wrapper-about', 'data'=>$fields['title_clone']]) ?>
            </div>
        <?php endif; ?>
        <div class="wrapper-about__right">
            <?php if(!empty($fields['text_clone'])) : ?>
                <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'wrapper-about', 'data'=>$fields['text_clone']]) ?>
            <?php endif; ?>
            <?php if(!empty($socials)) : ?>
                <ul class="wrapper-about__social social">
                    <?php foreach($socials as $social) : ?>
                        <li class="social__item">
                            <?php if(!empty($social->url)) : ?>
                                <a href="<?= esc_url($social->url) ?>" class="social__link">
                            <?php endif; ?>
                                <?= util_getIcon($social->url); ?>
                            <?php if(!empty($social->url)) : ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </article>
    </div>
</section>