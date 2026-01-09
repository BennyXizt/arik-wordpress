<?php
  $fields = [
    'clients' => get_field('clients')
  ];

  if(empty($fields['clients'])) return;
?>

<section class="layout__clients clients">
  <div class="clients__container container">
    <article class="clients__marquee marquee">
      <ul class="marquee__inner" data-fsc-marquee>
        <?php foreach($fields['clients'] as $image) : ?>
          <li class="marquee__item" data-fsc-marquee-item>
            <?php echo wp_get_attachment_image($image['ID'], 'full', false, ['class' => 'image']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </article>
  </div>
</section>