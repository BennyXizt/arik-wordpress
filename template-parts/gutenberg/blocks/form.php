<?php
    $args = $args ?? null;

    if($args) {

    }
    else {
        $fields = [
            'tag' => get_field('tag'),
            'title' => get_field('title_clone'),
            'fields' => get_field('fields'),
            'button'=> get_field('button')
        ];
    }

    $autocomplete = [
        'name' => 'name',
        'tel' => 'tel',
        'email' => 'email',
    ]
?>


<form data-fsc-phpmailer action="/php/mail.php" method="POST" class="contacts__form form-contacts">
    <div class="form-contacts__header">
        <?php if(!empty($fields['tag'])): ?>
            <div class="form-contacts__label">
                <?= esc_html($fields['tag']) ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($fields['title'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'form-contacts', 'data'=>$fields['title']]); ?>
        <?php endif; ?>
    </div>
    <?php if(!empty($fields['fields'])): ?>
        <div class="form-contacts__body">
            <?php foreach($fields['fields'] as $field) :
                $type = $field['type'];    
                $required = $field['required'];
                $name = $field['name'];
                $placeholder = $field['placeholder'];
            ?>
                <?php if($type == 'textarea'): ?>
                       <textarea <?= $required ? 'required' : '' ?> type="<?= esc_attr($type) ?>" name="<?= esc_attr($name)?>" placeholder="<?= esc_attr($placeholder)?>" autocomplete="<?= $autocomplete[$name] ?? 'off'?>" class="form-contacts__input"></textarea>
                <?php else: ?>
                    <input <?= $required ? 'required' : '' ?> type="<?= esc_attr($type) ?>" name="<?= esc_attr($name)?>" placeholder="<?= esc_attr($placeholder)?>" autocomplete="<?= $autocomplete[$name] ?? 'off' ?>" class="form-contacts__input">
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if(!empty($fields['button'])) : ?>
                <?php get_template_part('template-parts/gutenberg/blocks/button-link', null, ['blockClass'=>'form-contacts', 'data'=> array_merge($fields['button'],
                [
                    'attrType' => 'submit'
                ])]) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</form>