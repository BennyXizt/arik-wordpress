<?php
    $services = get_posts([
        'post_type'      => 'service_list',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'suppress_filters' => false,
    ]);

?>

   <section class="layout__services services">
    <div class="services__container container">
        <ul class="services__list">
            <?php foreach($services as $service) : 
                $id = $service->ID;
                $description = get_field('description', $id);   
                $terms = get_the_terms($id, 'category');
                $term = $terms[0];
                $link = get_permalink($id);
            ?>
                <article class="services__serviceCard serviceCard" data-fsc-watcher data-fsc-watcher-once>
                    <?php if(!empty($term)) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'serviceCard', 'data'=>[
                            'title' => $term->name,
                            'type' => 'h4'
                        ]]) ?>
                    <?php endif; ?>
                    <?php if(!empty($description)) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'serviceCard', 'data'=>[
                            'text' => "<p>{$description}</p>"
                        ]]) ?>
                    <?php endif; ?> 
                    <?php if(!empty($term)) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass'=>'serviceCard', 'data'=>[
                            'block_type' => 'link',
                            'type' => 'button-text',
                            'link' => [
                                'url' => $link,
                                'title' => 'About ' . $term->slug,
                            ],
                            'icon_clone' => [
                                'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                                'icon_name' => 'ph_arrow-up-right-light',
                                'rounded' => true
                            ]
                        ]]) ?>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </ul>
    </div>
</section>