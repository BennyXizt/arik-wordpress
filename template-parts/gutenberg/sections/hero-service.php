<?php
    $fields = [
        'headertext' => get_field('headertext_clone'),
        'image' => get_field('image')
    ]

?>


<section class="layout__hero-services hero-services">
          <div class="hero-services__container container">
            <?php if(!empty($fields['headertext'])): ?>
                <?php get_template_part('template-parts/gutenberg/blocks/headertext', null, ['blockClass'=>'hero-services', 'data'=>$fields['headertext']]) ?>
            <?php endif; ?>

            <?php if(!empty($fields['image'])) : ?>
                <figure class="hero-services__image image">
                    <?php wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']) ?>
                </figure>
            <?php endif; ?>
          </div>
        </section>