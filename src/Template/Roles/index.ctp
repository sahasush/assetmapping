
<div class="container">
<nav class="posright" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>

    <h3><?= __('Roles') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('role_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('priority') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $this->Number->format($role->role_id) ?></td>
                <td><?= h($role->name) ?></td>
                <td><?= $this->Number->format($role->priority) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $role->role_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->role_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->role_id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->role_id)]) ?>
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
