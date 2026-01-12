<?php
    $fields = [
        'services' => get_field('service_repeater')
    ];
?>

   <section class="layout__services services">
    <div class="services__container container">
        <ul class="services__list">
            <?php foreach($fields['services'] as $service) : ?>
                <article class="services__serviceCard serviceCard">
                    <?php if(!empty($service['title_clone'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'serviceCard', 'data'=>$service['title_clone']]) ?>
                    <?php endif; ?>
                    <?php if(!empty($service['text_clone'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'serviceCard', 'data'=>$service['text_clone']]) ?>
                    <?php endif; ?> 
                    <?php if(!empty($service['button_clone'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass'=>'serviceCard', 'data'=>$service['button_clone']]) ?>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </ul>
    </div>
</section>