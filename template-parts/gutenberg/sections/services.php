<?php
    $fields = [
        'services' => get_field('service_repeater')
    ];
?>

   <section class="layout__services services">
    <div class="services__container container">
        <ul class="services__list">
            <?php foreach($fields['services'] as $service) : ?>
                <article class="services__serviceCard serviceCard">
                    <?php if(!empty($service['title'])) : ?>
                        <h4 class="serviceCard__title">
                            <?= wp_kses($service['title'], ['span'=>[]]) ?>
                        </h4>
                    <?php endif; ?>

                <div class="serviceCard__text text">
                    <p>
                    Visually stunning web designs that captivate your audience
                    by blending your brand voice and customer needs.
                    </p>
                </div>

                <button
                    class="serviceCard__button button button--type-button-text"
                >
                    About Webdesign

                    <div
                    class="serviceCard__icon-rounded icon-rounded icon-rounded--size-32"
                    >
                    <svg class="icon-rounded__icon">
                        <use
                        href="./media/icons/sprite.svg#ph_arrow-up-right-light"
                        ></use>
                    </svg>
                    </div>
                </button>
                </article>
            <?php endforeach; ?>
        </ul>
    </div>
</section>