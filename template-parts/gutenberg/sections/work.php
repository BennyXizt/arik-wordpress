<?php
   $fields = [
    'title_clone' => get_field('title_clone'),
    'button_clone' => get_field('button_clone'),
    'cards' => get_field('cards')
   ];
?>


  <section class="layout__work work">
          <div class="work__container container">
            <div class="work__header">
                <?php if(!empty($fields['title_clone'])): ?>
                    <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'work', 'data'=>$fields['title_clone']]); ?>
                <?php endif; ?>
                <?php if(!empty($fields['button_clone'])) : ?>
                    <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass'=>'work', 'data'=>$fields['button_clone']]); ?>
                <?php endif; ?>
            </div>
            <?php if(!empty($fields['cards'])) : ?>
                <ul class="work__content">
                    <?php foreach($fields['cards'] as $card) : ?>
                        <?php if(!empty($card['card_clone'])) : ?>
                            <?php get_template_part('template-parts/gutenberg/blocks/work-card', null, ['data'=>$card['card_clone']]) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
          </div>
        </section>