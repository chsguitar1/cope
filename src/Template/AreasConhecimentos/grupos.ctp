<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<fieldset>
    <legend><?= __('Add {0}', ['Areas Conhecimento']) ?></legend>
    <?php
    echo $this->Form->input('nivel',['options' => $gp]);
    ?>
</fieldset>