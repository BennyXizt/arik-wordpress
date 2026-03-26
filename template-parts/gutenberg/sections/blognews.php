<?php
    $blog_page = get_page_by_path('blog');
    $archive_link = $blog_page ? get_permalink($blog_page->ID) : home_url('/blog/');
?>

<section class="layout__blognews blognews">
    <div class="blognews__container container">
        <div class="blognews__header">
            <h5 class="blognews__title">Related <span>News</span></h5>

            <a href=<?= $archive_link ?> class="blognews__button button button--type-button-text">
                See all
                
                <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'icon','data'=>[
                    'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                    'icon_name' => 'ph_arrow-up-right-light',
                    'rounded' => true,
                    'size' => '32',
                ]]) ?>
            </a>
        </div>
        <?php get_template_part('template-parts/gutenberg/blocks/blog') ?>
    </div>
</section>