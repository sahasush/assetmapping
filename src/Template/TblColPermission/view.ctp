<nav class="posleft">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbl Col Permission'), ['action' => 'edit', $tblColPermission->tbl_col_perm_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl Col Permission'), ['action' => 'delete', $tblColPermission->tbl_col_perm_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblColPermission->tbl_col_perm_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbl Col Permission'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbl Col Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">
    <h3>Tbl_Col_Permission_ID:<?= h($tblColPermission->tbl_col_perm_id) ?></h3>
   <table class = "table table-bordered">
        <tr>
            <th><?= __('Table Name') ?></th>
            <td><?= h($tblColPermission->table_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Col Name') ?></th>
            <td><?= h($tblColPermission->col_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $tblColPermission->has('role') ? $this->Html->link($tblColPermission->role->name, ['controller' => 'Roles', 'action' => 'view', $tblColPermission->role->role_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tbl Col Perm Id') ?></th>
            <td><?= $this->Number->format($tblColPermission->tbl_col_perm_id) ?></td>
        </tr>
    </table>
</div>
