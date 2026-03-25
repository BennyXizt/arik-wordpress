<?php get_header(); ?>
<?php
    $headerText = [
        'title_clone'=> [
            'title'=>get_the_title(),
            'type'=>'h1'
        ],
        'text_clone'=> [
            'text'=>"<p>". get_field('description') ."</p>",
            'size'=>'20'
        ],
        'button_clone'=> [
            'label'=>'Read More',
            'scroll'=>'.content-singleblog',
            'type'=>'button-text',
            'size'=>'small',
            'icon_clone'=> [
                'file'=>get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                'icon_name'=>'ph_arrow-down-light',
                'rounded'=>true
            ]
        ]
    ];
    $date = get_the_date('jS M Y');
    $datetime = get_the_date('d-m-Y');
    $categories = array_map(
        fn($e) => $e->name
        , array_filter(get_the_category(), fn($e) => !empty($e->name))
    );
    $category = implode(', ', $categories);
    $reading_time=util_get_reading_time();
            
?>
<main class="layout--blogsingle">
    <section class="layout__hero-singleblog hero-singleblog">
          <div class="hero-singleblog__container container">
            <?php get_template_part('template-parts/gutenberg/blocks/header-text', null, ['blockClass'=>'hero-singleblog', 'data'=>$headerText]) ?>

            <ul class="hero-singleblog__info info-singleblog">
                <li class="info-singleblog__list" data-fsc-watcher data-fsc-watcher-once>
                    <div class="info-singleblog__label">Date</div>
                    <time datetime=<?= esc_attr($datetime) ?> class="info-singleblog__value">
                        <?= esc_html($date) ?>
                    </time>
                </li>
                <?php if(!empty($category)): ?>
                    <li class="info-singleblog__list" data-fsc-watcher data-fsc-watcher-once>
                        <div class="info-singleblog__label">Category</div>

                        <div class="info-singleblog__value">
                            <?= esc_html($category) ?>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(!empty($reading_time)): ?>
                    <li class="info-singleblog__list" data-fsc-watcher data-fsc-watcher-once>
                        <div class="info-singleblog__label">Reading time</div>

                        <div class="info-singleblog__value">
                            <?= esc_html($reading_time) ?>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="hero-singleblog__media" data-fsc-watcher data-fsc-watcher-once>
              <figure class="hero-singleblog__noise">
                <img src="<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png' ?>" />
              </figure>

              <figure class="hero-singleblog__image">
                <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class'=>'']); ?>
              </figure>
            </div>
          </div>
    </section>
     <section class="layout__content-singleblog content-singleblog">
        <div class="content-singleblog__container container cms" data-fsc-watcher data-fsc-watcher-once>
          <?=the_content()?>
        </div>
    </section>

</main>
<?php get_footer(); ?>
