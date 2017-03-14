<?php if ($field->isWrapper()): ?>
<li class="form-control">
    <label for="<?= $field->getId() ?>"><?= $label ?></label>
    <label for="<?= $field->getId() ?>"><?php endif; ?>
    <input <?= $properties ?> />
<?php if ($field->isWrapper()): ?>
    </label>
</li>
<?php endif; ?>