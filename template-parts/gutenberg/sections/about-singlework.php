<?php
    $fields = [
        'tag' => get_field('tag'),
        'title' => get_field('title'),
        'list' => get_field('list'),
    ];

?>

<section class="layout__about-singlework about-singlework">
    <div class="about-singlework__container container">
        <div class="about-singlework__content">
            <?php if(!empty($fields['tag'])) : ?>
                <div class="about-singlework__tag">
                    <?= esc_html($fields['tag']) ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($fields['tag'])) : ?>
                <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'about-singlework', 'data'=>$fields['title']]) ?>
            <?php endif; ?>
        </div>
        <div class="about-singlework__items">
            <?php if(!empty($fields['list'])) : ?>
                <?php foreach($fields['list'] as $item) : ?>
                    <article class="singleworkAboutCard" data-fsc-watcher data-fsc-watcher-once>
                        <?php if(!empty($item['title'])) : ?>
                            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'singleworkAboutCard', 'data'=>$item['title']]) ?>
                        <?php endif; ?>
                        <?php if(!empty($item['text'])) : ?>
                            <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'singleworkAboutCard', 'data'=>$item['text']]) ?>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>