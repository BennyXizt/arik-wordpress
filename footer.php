<?php if(!empty($aside = get_field('aside', 'option'))) : ?>
    <?php get_template_part('template-parts/gutenberg/sections/aside', null, ['data'=>$aside]); ?>
<?php endif; ?>
<?php get_template_part('template-parts/wordpress/footer'); ?>
</div>
<?php wp_footer(); ?>
</body>

</html>