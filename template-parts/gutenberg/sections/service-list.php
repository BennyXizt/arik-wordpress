<?php
    $services = get_posts([
        'post_type'      => 'service_list',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'suppress_filters' => false, 
    ]);

    if(empty($services)) 
        return
    
?>


 <section class="layout__service-list service-list">
    <div class="service-list__container container">
        <?php foreach($services as $service) : setup_postdata($service);
            $id = $service->ID;    
            $title = get_the_title($id);
            $content = get_the_content(null, false, $id);
            $imageID = get_post_thumbnail_id($id);
            $terms = get_the_terms($id, 'category');
            $term = !empty($terms) ? $terms[0] : null;
            $term_link = !empty($term) ? get_term_link($term->term_id) : null;

            $fields = [
                'list' => get_field('list', $id)
            ];
        ?>
            <article class="service-list__service-list-item item-list-service" id="<?= esc_attr($term->slug) ?>" data-fsc-watcher data-fsc-watcher-once>
                <?php if(!empty($term)) : ?>
                    <div class="item-list-service__tag">
                        <?=esc_html($term->slug)?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($title)) : ?>
                    <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'item-list-service', 'data'=>[
                        'title' => $title,
                        'type' => 'h2',
                    ]]) ?>
                <?php endif; ?>
                <div class="item-list-service__link-image">
                    <figure class="item-list-service__noise image">
                        <img src='<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png' ?>'/>
                    </figure>
                    <?php if(!empty($imageID)) : ?>
                        <figure class="item-list-service__image image">
                            <?= wp_get_attachment_image($imageID, 'full', false, ['class'=>'']);  ?>
                        </figure>
                    <?php endif; ?>
                </div>
                <?php if(!empty($fields['list'])) : ?>
                    <table class="item-list-service__table table-service">
                        <?php foreach($fields['list'] as $item) : ?>
                            <tr class="table-service__row">
                                <?php if(!empty($label = $item['label'])) : ?>
                                    <td class="table-service__label">
                                        <?= esc_html($label) ?>
                                    </td>
                                <?php endif; ?>
                                <?php if(!empty($text = $item['text_clone'])) : ?>
                                    <td class="table-service__text text">
                                        <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'table-service', 'data'=>$text]) ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
                <?= $content ?>
            </article>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
</section>
