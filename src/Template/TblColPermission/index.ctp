<nav class="posleft">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbl Col Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="container">
    <h3><?= __('Tbl Col Permission') ?></h3>
     <table class = "table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('tbl_col_perm_id') ?></th>
                <th><?= $this->Paginator->sort('table_name') ?></th>
                <th><?= $this->Paginator->sort('col_name') ?></th>
                <th><?= $this->Paginator->sort('role_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblColPermission as $tblColPermission): ?>
            <tr>
                <td><?= $this->Number->format($tblColPermission->tbl_col_perm_id) ?></td>
                <td><?= h($tblColPermission->table_name) ?></td>
                <td><?= h($tblColPermission->col_name) ?></td>
                <td><?= $tblColPermission->has('role') ? $this->Html->link($tblColPermission->role->name, ['controller' => 'Roles', 'action' => 'view', $tblColPermission->role->role_id]) : '' ?>
             
                
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblColPermission->tbl_col_perm_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblColPermission->tbl_col_perm_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblColPermission->tbl_col_perm_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblColPermission->tbl_col_perm_id)]) ?>
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
