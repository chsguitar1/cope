
<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roleUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($roleUser) ?>
    <fieldset>
        <legend><?= __('Add Role User') ?></legend>
        <?php
            echo $this->Form->input('default_role', ['options' => $user->escoposUsers(),'label' => 'Escopo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
