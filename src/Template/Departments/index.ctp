<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="departments index large-9 medium-8 columns content">
    <h3><?= __('Departments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Departments_ID') ?></th>
                <th><?= $this->Paginator->sort('Department') ?></th>
                <th><?= $this->Paginator->sort('Colleges_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
            <tr>
                <td><?= $this->Number->format($department->Departments_ID) ?></td>
                <td><?= h($department->Department) ?></td>
                <td><?= $this->Number->format($department->Colleges_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $department->Departments_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $department->Departments_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $department->Departments_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $department->Departments_ID)]) ?>
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
