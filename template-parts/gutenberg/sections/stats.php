<?php
    $fields = [
        'stats' => get_field('stats')
    ];

?>

<section class="layout__stats stats">
    <div class="stats__container container">
        <?php if($fields['stats']) : ?>
            <?php foreach($fields['stats'] as $item) : ?>
                <article class="stats__item item-stats">
                    <?php if(!empty($item['title'])) : ?>
                        <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'item-stats', 'data'=>$item['title']]) ?>
                    <?php endif; ?>
                    <div class="item-stats__value">
                        <?php if(!empty($item['value'])) : ?>
                            <span data-fsc-counter data-fsc-counter-duration="3000" data-fsc-counter-easing="1" data-fsc-counter-finalValue="<?= esc_attr($item['value']) ?>">
                                0
                            </span>
                        <?php endif; ?>
                        <?php if(!empty($item['tag'])) : ?>
                            <?= esc_html($item['tag']) ?>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>