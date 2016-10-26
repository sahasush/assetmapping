<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit College'), ['action' => 'edit', $college->Colleges_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete College'), ['action' => 'delete', $college->Colleges_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $college->Colleges_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Colleges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New College'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colleges view large-9 medium-8 columns content">
    <h3><?= h($college->Colleges_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('College') ?></th>
            <td><?= h($college->College) ?></td>
        </tr>
        <tr>
            <th><?= __('Colleges ID') ?></th>
            <td><?= $this->Number->format($college->Colleges_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($college->University_ID) ?></td>
        </tr>
    </table>
</div>
