<nav class="posleft">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->role_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->role_id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->role_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">
    <h3><?= h($role->name) ?></h3>
    <table class="table table-reflow">
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $this->Number->format($role->role_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Priority') ?></th>
            <td><?= $this->Number->format($role->priority) ?></td>
        </tr>
        <tr>
        <th><?= __('Users') ?></th>
        <td>
            <?php if (!empty($role->users)): ?>
        
                <?php foreach ($role->users as $user): ?>
                    <li><?= h($user->email) ?> </li>
                <?php endforeach; ?>
            </td>
            <?php else: ?>
            <p>None</p>
        <?php endif; ?>
        </td>
        
        </tr>
    </table>
</div>
