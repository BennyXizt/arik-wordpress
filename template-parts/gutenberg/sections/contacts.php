<?php
  $fields = [
    'image' => get_field('image'),
    'form' => get_field('form'),
  ];

  $locations = get_nav_menu_locations();
  $socialsID = $locations['socials'];
  $socials = wp_get_nav_menu_items($socialsID);
?>


<section class="layout__contacts contacts">
  <div class="contacts__container container">
    <?php if(!empty($fields['image'])) : ?>
      <figure class="contacts__picture image">
        <?= wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']); ?>
      </figure>
    <?php endif; ?>

    <div class="contacts__body">
      <?php if(!empty($fields['form'])) : ?>
        <?php get_template_part('template-parts/gutenberg/blocks/form', null, ['blockClass'=>'', 'data'=> array_merge($fields['form'],
        [
          'dataAttribute' => 'data-fsc-watcher data-fsc-watcher-once'
        ])]); ?>
      <?php endif; ?>

      <?php if(!empty($socials)) :
          $data = [
              'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg'
          ];
      ?>
          <ul class="contacts__social social social--button" data-fsc-watcher data-fsc-watcher-once>
              <?php foreach($socials as $social) : ?>
                  <li class="social__item">
                      <?php if(!empty($social->url)) : ?>
                          <a href="<?= esc_url($social->url) ?>" class="social__link">
                      <?php endif; ?>
                      <?= util_getIcon($social->url, $data); ?>
                      <span class="social__label"><?= $social->title ?></span>
                      <?php get_template_part('template-parts/gutenberg/blocks/icon', null, ['blockClass'=>'social__link-arrow icon','data'=>[
                          'file' => get_template_directory_uri() . '/assets/media/icons/sprite.svg',
                          'icon_name' => 'ph_arrow-up-right-light'
                      ]]) ?>
                      <?php if(!empty($social->url)) : ?>
                          </a>
                      <?php endif; ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php endif; ?>
    </div>
  </div>
</section>