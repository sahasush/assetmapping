<nav class="posleft">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">
    <h3>User ID :<?= h($user->id) ?></h3>
      <table class="table table-reflow">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
         <th><?= __('Roles') ?></th>
            <td>
        <?php if (!empty($user->roles)): ?>
        
                <?php foreach ($user->roles as $role): ?>
                    <li><?= h($role->name) ?> </li>
                <?php endforeach; ?>
            </td>
            <?php else: ?>
            <p>None</p>
        <?php endif; ?>    
            
            
            
            </td>
        
        
        </tr>
    </table>
</div>
