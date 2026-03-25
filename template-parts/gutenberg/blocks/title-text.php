<?php
    $fields = [
        'title' => get_field('title'),
        'text' => get_field('text'),
    ]
?>

<section>
    <?php if(!empty($fields['title'])) : ?>
        <h2>
            <?= esc_html($fields['title']); ?>
        </h2>
    <?php endif; ?>
    <?php if(!empty($fields['text'])) : ?>
        <p>
            <?= esc_html($fields['text']); ?>
        </p>
    <?php endif; ?>
</section>