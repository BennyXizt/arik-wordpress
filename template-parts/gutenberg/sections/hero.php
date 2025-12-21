<?php
    $fields = [
        'headerText' => get_field('header_text_clone'),
        'image' => get_field('image')
    ];
?>

<section class="layout__hero hero">
    <div class="hero__container container">
        <figure class="hero__image image">
            <?php 
                if(isset($fields['image'])) {
                   echo wp_get_attachment_image($fields['image']['ID'], 'full', false, ['class'=>'']);
                }
            ?>
        </figure>
        <?php 
            if(isset($fields['headerText'])) {
               get_template_part('template-parts/gutenberg/blocks/header-text');
            }
        ?>
           
    </div>
</section>