<?php
    $fields = [
        'headertext_clone' => get_field('headertext_clone'),
        'process_list' => get_field('process_list')
    ]
?>

<section class="layout__process process">
    <div class="process__container container">
        <?php if(!empty($fields['headertext_clone'])) : ?>
            <div class="process__top">
                <?php get_template_part('template-parts/gutenberg/blocks/header-text', null, ['blockClass'=>'process', 'data'=>$fields['headertext_clone']]); ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($fields['process_list'])) : ?>
            <ul class="process__list">
                <?php foreach($fields['process_list'] as $process) : ?>
                    <li class="process__item">
                        <?php if($process['direction'] == 'left') : ?>
                            <div class="processCard__wrapper">
                                <?php if(!empty($process['time'])) : ?>
                                    <div class="processCard__time">
                                        <?= esc_html($process['time']) ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($process['tag'])) : ?>
                                    <div class="processCard__tag">
                                        <?= esc_html($process['tag']) ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($process['title'])) : ?>
                                    <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'processCard', 'data'=>$process['title']]) ?>
                                <?php endif; ?>
                                <?php if(!empty($process['text'])) : ?>
                                    <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'processCard', 'data'=>$process['text']]) ?>
                                <?php endif; ?>
                                <?php if(!empty($process['lists'])) : ?>
                                    <ul class="processCard__list">
                                        <?php foreach($process['lists'] as $item) : ?>
                                            <li><?= esc_html($item['item']) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="process__line"></div>
                            <div class="process__empty"></div>
                        <?php else : ?>
                            <div class="process__empty"></div>
                            <div class="process__line"></div>
                            <div class="processCard__wrapper">
                                <?php if(!empty($process['time'])) : ?>
                                    <div class="processCard__time">
                                        <?= esc_html($process['time']) ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($process['tag'])) : ?>
                                    <div class="processCard__tag">
                                        <?= esc_html($process['tag']) ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($process['title'])) : ?>
                                    <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'processCard', 'data'=>$process['title']]) ?>
                                <?php endif; ?>
                                <?php if(!empty($process['text'])) : ?>
                                    <?php get_template_part('template-parts/gutenberg/blocks/text', null, ['blockClass'=>'processCard', 'data'=>$process['text']]) ?>
                                <?php endif; ?>
                                <?php if(!empty($process['lists'])) : ?>
                                    <ul class="processCard__list">
                                        <?php foreach($process['lists'] as $item) : ?>
                                            <li><?= esc_html($item['item']) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>