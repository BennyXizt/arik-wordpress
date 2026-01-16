<?php
  $args = $args ?? null;

  if($args) {
    $fields = [
      'marguees' => $args['data']['marquees'],
      'headertext' => $args['data']['headertext_clone']
    ];
  }

?>

<aside class="cta">
  <article class="marquee">
    <?php if(!empty($fields['marguees'])): ?>
      <ul class="marquee__inner" data-fsc-marquee>
        <?php foreach($fields['marguees'] as $item): ?>
          <li class="marquee__item" data-fsc-marquee-item>
            <?= esc_html($item['marquee']) ?>
          </li>
          <li class="marquee__item" data-fsc-marquee-item>+++</li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </article>
  <?php if(!empty($fields['headertext'])): ?>
    <section class="cta__body">
      <div class="cta__container container">
        <?php get_template_part('template-parts/gutenberg/blocks/header-text', null, ['blockClass'=>'cta', 'data'=>$fields['headertext']]); ?>
      </div>
    </section>
  <?php endif; ?>
</aside>