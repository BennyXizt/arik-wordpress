<?php
    $fields = [
        'serviceList' => get_field('servicelist')
    ];

    if(empty($fields['serviceList'])) 
        return
    
?>


 <section class="layout__service-list service-list">
    <div class="service-list__container container">
        <?php foreach($fields['serviceList'] as $serviceList) : ?>
            <article class="service-list__service-list-item item-list-service">
                <?php if(!empty($tag = $serviceList['tag'])) : ?>
                    <div class="item-list-service__tag"><?=esc_html($tag)?></div>
                <?php endif; ?>
                <?php if(!empty($title = $serviceList['title_clone'])) : ?>
                    <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'item-list-service', 'data'=>$title]) ?>
                <?php endif; ?>
                <div class="item-list-service__link-image">
                    <figure class="item-list-service__noise image">
                        <img src='<?= get_template_directory_uri() . '/assets/media/image/works/Noise.png' ?>'/>
                    </figure>
                    <?php if(!empty($image = $serviceList['image'])) : ?>
                        <figure class="item-list-service__image image">
                            <?= wp_get_attachment_image($image['ID'], 'full', false, ['class'=>'']);  ?>
                        </figure>
                    <?php endif; ?>
                </div>
                <?php if(!empty($serviceList['list'])) : ?>
                    <table class="item-list-service__table table-service">
                        <?php foreach($serviceList['list'] as $item) : ?>
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
            </article>
        <?php endforeach; ?>
    </div>
</section>
