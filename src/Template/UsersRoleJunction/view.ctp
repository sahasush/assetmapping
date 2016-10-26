<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Role Junction'), ['action' => 'edit', $usersRoleJunction->role_junction_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Role Junction'), ['action' => 'delete', $usersRoleJunction->role_junction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersRoleJunction->role_junction_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Role Junction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Role Junction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersRoleJunction view large-9 medium-8 columns content">
    <h3><?= h($usersRoleJunction->role_junction_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $usersRoleJunction->has('role') ? $this->Html->link($usersRoleJunction->role->name, ['controller' => 'Roles', 'action' => 'view', $usersRoleJunction->role->role_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Role Junction Id') ?></th>
            <td><?= $this->Number->format($usersRoleJunction->role_junction_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersRoleJunction->id) ?></td>
        </tr>
    </table>
</div>
