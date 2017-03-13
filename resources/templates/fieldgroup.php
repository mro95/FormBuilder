<div class="form-control field-group">
    <label for="<?= $fields[0]->getId(); ?>"><?= $label ?></label>

    <?php foreach ($fields as $field): ?>
        <label for="<?= $field->getId() ?>">
            <?= (new $textFieldView($field))->render(); ?>
        </label>
    <?php endforeach; ?>
</div>