

<?php if (is_admin() || (isset($is_preview) && $is_preview)) : ?>
    <div style="border: 1px solid black; padding: 30px">
        <p style="text-align: center; color: #999; font-style: italic;">
            <?= esc_html($localized_message) ?>
        </p>
    </div>
<?php endif; ?>
