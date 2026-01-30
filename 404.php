<?php get_header(); ?>
<main class="layout <?= !is_front_page() ? 'layout--' . esc_attr(strtolower(get_the_title())) : '' ?>">
    Page Not Found
</main>
<?php get_footer(); ?>