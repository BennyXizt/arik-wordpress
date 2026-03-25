<?php
    $args = $args ?? null;

    if($args) {
        $fields = [
            'tag' => $args['data']['tag'],
            'title' => $args['data']['title_clone'],
            'fields' => $args['data']['fields'],
            'button'=> $args['data']['button'],
            'dataAttribute' => $args['data']['dataAttribute'] ?? ''
        ];
    }
    else {
        $fields = [
            'tag' => get_field('tag'),
            'title' => get_field('title_clone'),
            'fields' => get_field('fields'),
            'button'=> get_field('button'),
            'dataAttribute' => get_field('dataAttribute') ?? ''
        ];
    }

    $autocomplete = [
        'name' => 'name',
        'tel' => 'tel',
        'email' => 'email',
    ]
?>

<form class="contacts__form form-contacts form" <?=$fields['dataAttribute']?>>
    <div class="form__header">
        <?php if(!empty($fields['tag'])): ?>
            <div class="form__label">
                <?= esc_html($fields['tag']) ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($fields['title'])) : ?>
            <?php get_template_part('template-parts/gutenberg/blocks/title', null, ['blockClass'=>'form', 'data'=>$fields['title']]); ?>
        <?php endif; ?>
    </div>
    <?php if(!empty($fields['fields'])): ?>
        <div class="form__body">
            <?php foreach($fields['fields'] as $field) :
                $type = $field['type'];    
                $required = $field['required'];
                $name = $field['name'];
                $placeholder = $field['placeholder'];
            ?>
                <?php if($type == 'textarea'): ?>
                       <textarea <?= $required ? 'required' : '' ?> type="<?= esc_attr($type) ?>" name="<?= esc_attr($name)?>" placeholder="<?= esc_attr($placeholder)?>" autocomplete="<?= $autocomplete[$name] ?? 'off'?>" class="form__input"></textarea>
                <?php else: ?>
                    <input <?= $required ? 'required' : '' ?> type="<?= esc_attr($type) ?>" name="<?= esc_attr($name)?>" placeholder="<?= esc_attr($placeholder)?>" autocomplete="<?= $autocomplete[$name] ?? 'off' ?>" class="form__input">
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