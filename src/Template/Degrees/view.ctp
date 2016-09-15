<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Degree'), ['action' => 'edit', $degree->Degrees_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Degree'), ['action' => 'delete', $degree->Degrees_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->Degrees_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="degrees view large-9 medium-8 columns content">
    <h3><?= h($degree->Degrees_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Degree Level') ?></th>
            <td><?= h($degree->Degree_Level) ?></td>
        </tr>
        <tr>
            <th><?= __('Program Name') ?></th>
            <td><?= h($degree->Program_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Other') ?></th>
            <td><?= h($degree->Other) ?></td>
        </tr>
        <tr>
            <th><?= __('Degrees ID') ?></th>
            <td><?= $this->Number->format($degree->Degrees_ID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($degree->Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($degree->Sources)); ?>
    </div>
</div>
