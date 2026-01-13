<?php

    $fields = [
        'headertext_clone' => get_field('headertext_clone'),
        'list' => get_field('list'),
    ];

    $testimonials = get_posts([
        'post_type' => 'testimonial',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
    ]);

?>

<section class="layout__testimonials testimonials">
    <div class="testimonials__container container">
    <?php if(!empty($fields['headertext_clone'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/header-text', null, ['blockClass'=>'testimonials', 'data'=>$fields['headertext_clone']]) ?>
    <?php endif; ?>
    <?php if(!empty($testimonials)) : ?>
        <ul class="testimonials__list">
            <?php foreach($testimonials as $item) : ?>
                <?php
                    $id = $item->ID;

                    $title = get_the_title($id);
                    $content = get_the_content(null, false, $id);
                    $logo = get_field('logo', $id);
                    $avatar = get_field('avatar', $id);
                    $name = get_field('name', $id);
                    $company = get_field('company', $id);
                ?>
                <li class="testimonials__item">
                    <div class="testimonialCard">
                        <div class="testimonialCard__inner">
                            <?php if(!empty($logo)) : ?>
                                <figure class="testimonialCard__logo image">
                                    <?= wp_get_attachment_image($logo['ID'], 'full', false, ['class'=>'']); ?>
                                </figure>
                            <?php endif; ?>
                            <?php if(!empty($title)) : ?>
                                <?php 
                                    get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'testimonialCard', 'data'=> [
                                        'title' => $title,
                                        'type' => 'h6'
                                    ]])    
                                ?>
                            <?php endif; ?>
                            <?php if(!empty($content)) : ?>
                                <?php 
                                    get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'testimonialCard', 'data'=> [
                                        'text' => $content,
                                        'size' => '16'
                                    ]])    
                                ?>
                            <?php endif; ?>
                            <div class="testimonialCard__avatar avatar-testimonialCard">
                                <?php if(!empty($avatar)) : ?>
                                    <figure class="avatar-testimonialCard__image image">
                                        <?= wp_get_attachment_image($avatar['ID'], 'full', false, ['class'=>'']); ?>
                                    </figure>
                                <?php endif; ?>
                                <div class="avatar-testimonialCard__content">
                                    <?php if(!empty($name)) : ?>
                                        <span class="avatar-testimonialCard__name">
                                            <?= esc_html($name); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(!empty($company)) : ?>
                                        <span class="avatar-testimonialCard__company">
                                            <?= esc_html($company); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div> 
                        </div>
                    </div>
                </li>
            <?php endforeach; wp_reset_postdata(); ?>
        </ul>
    <?php endif; ?>
    </div>
</section>