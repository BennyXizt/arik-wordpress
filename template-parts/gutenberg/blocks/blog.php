<?php
    $posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'suppress_filters' => false, 
    ]);

    if(empty($posts)) return;
?>

<div class="posts__body body-posts">
    <?php foreach($posts as $post) : setup_postdata($post);
        $id = $post->ID;
        $title = get_the_title($id);
        $link = get_permalink($id);    
        $imageID = get_post_thumbnail_id($id);
        $date = get_the_date('jS M Y', $id);
        $datetime = get_the_date('Y-m-d', $id); 
        $description = get_field('description', $id);
        $terms = get_the_terms($id, 'category');
        $term = $terms[0] ?? [];
        $term_link = get_term_link($term->term_id);
    ?>
        <article class="body-posts__postCard postCard">
            <a href="<?= esc_url($link); ?>" class="postCard__link-image">
                <figure class="postCard__noise image">
                    <img src="<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png'?>" />
                </figure>

                <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'postCard', 'data'=>[
                    'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                    'icon_name' => 'ph_arrow-up-right-light',
                    'rounded' => true,
                    'size' => '46',
                ]])?>

                <figure class="postCard__image image">
                    <?= wp_get_attachment_image($imageID, 'full', false, ['class'=>'']);  ?>
                </figure>
            </a>
            <div class="postCard__body">
                <time datetime="<?= esc_attr($datetime) ?>" class="postCard__date"><?= esc_html($date) ?></time>
                <h4 class="postCard__title"><?= esc_html($title) ?></h4>
                <div class="postCard__text text">
                    <p><?= esc_html($description)?></p>
                </div>
            </div>
        <a href="<?= esc_url($term_link) ?>" class="postCard__category"> 
            <?= esc_html($term->slug) ?>
        </a>
        </article>
    <?php endforeach; wp_reset_postdata(); ?>
</div>