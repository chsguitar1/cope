<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cronograma'), ['action' => 'edit', $cronograma->idcronograma]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cronograma'), ['action' => 'delete', $cronograma->idcronograma], ['confirm' => __('Are you sure you want to delete # {0}?', $cronograma->idcronograma)]) ?> </li>
        <li><?= $this->Html->link(__('List Cronograma'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cronograma'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cronograma view large-9 medium-8 columns content">
    <h3><?= h($cronograma->idcronograma) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Idcronograma') ?></th>
            <td><?= $this->Number->format($cronograma->idcronograma) ?></td>
        </tr>
        <tr>
            <th><?= __('Idprojeto') ?></th>
            <td><?= $this->Number->format($cronograma->idprojeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Atividade') ?></th>
            <td><?= $this->Number->format($cronograma->atividade) ?></td>
        </tr>
        <tr>
            <th><?= __('Janeiro') ?></th>
            <td><?= $cronograma->janeiro ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Fevereiro') ?></th>
            <td><?= $cronograma->fevereiro ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Marco') ?></th>
            <td><?= $cronograma->marco ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Abril') ?></th>
            <td><?= $cronograma->abril ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Maio') ?></th>
            <td><?= $cronograma->maio ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Junho') ?></th>
            <td><?= $cronograma->junho ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Julho') ?></th>
            <td><?= $cronograma->julho ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Agosto') ?></th>
            <td><?= $cronograma->agosto ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Setembro') ?></th>
            <td><?= $cronograma->setembro ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Outubro') ?></th>
            <td><?= $cronograma->outubro ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Novembro') ?></th>
            <td><?= $cronograma->novembro ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Dezembro') ?></th>
            <td><?= $cronograma->dezembro ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
