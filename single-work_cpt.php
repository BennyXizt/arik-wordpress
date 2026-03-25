<?php get_header(); 
    $fields = [
        'title' => get_the_title(),
        'description' => get_field('description'),
        'button' => get_field('button_work'),
        'infos' => get_field('infos'),
    ];
?>
<main class="layout layout--worksingle">
    <section class="layout__hero-singlework hero-singlework">
        <div class="hero-singlework__container container" data-fsc-watcher data-fsc-watcher-once>
            <article class="hero-singlework__headerText headerText">
                <?php if(!empty($fields['title'])) : ?>
                    <h1 class="headerText__title">
                        <?= esc_html($fields['title']) ?>
                    </h1>
                <?php endif; ?>
                <?php if(!empty($fields['description'])) : ?>
                    <div class="headerText__text text text--size-24">
                        <p>
                            <?= esc_html($fields['description']) ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if(!empty($fields['infos'])) : ?>
                    <ul class="headerText__info info-headerText">
                        <?php foreach($fields['infos'] as $info) : ?>
                            <li class="info-headerText__item" data-fsc-watcher data-fsc-watcher-once>
                                <?php if(!empty($info['label'])) : ?>
                                    <div class="info-headerText__label">
                                    <?= esc_html($info['label']) ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($info['value'])) : ?>
                                    <div class="info-headerText__value">
                                        <?= esc_html($info['value']) ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(!empty($fields['button'])) : ?>
                    <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass'=>'hero-singlework', 'data'=>$fields['button']]) ?>
                <?php endif; ?>
            </article>
            <div class="hero-singlework__body" data-fsc-watcher data-fsc-watcher-once>
                <figure class="hero-singlework__noise image">
                    <img src="<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png' ?>" />
                </figure>

                <figure class="hero-singlework__image image">
                    <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class'=>'']); ?>
                </figure>
            </div>
        </div>
    </section>
    <?php the_content(); ?>
</main>
<?php get_footer(); ?>