<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="degrees index large-9 medium-8 columns content">
    <h3><?= __('Degrees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Degrees_ID') ?></th>
                <th><?= $this->Paginator->sort('Degree_Level') ?></th>
                <th><?= $this->Paginator->sort('Program_Name') ?></th>
                <th><?= $this->Paginator->sort('Other') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($degrees as $degree): ?>
            <tr>
                <td><?= $this->Number->format($degree->Degrees_ID) ?></td>
                <td><?= h($degree->Degree_Level) ?></td>
                <td><?= h($degree->Program_Name) ?></td>
                <td><?= h($degree->Other) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $degree->Degrees_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $degree->Degrees_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $degree->Degrees_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->Degrees_ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
