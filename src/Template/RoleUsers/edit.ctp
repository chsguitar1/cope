<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $roleUser->usuario_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $roleUser->usuario_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Role Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roleUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($roleUser) ?>
    <fieldset>
        <legend><?= __('Edit Role User') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
