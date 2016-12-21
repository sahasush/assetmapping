<div class="container">
<nav class="posright">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->role_id['0']['role']]) ?> </li>
        
    </ul>
</nav>
    <h3><?= h($role->name) ?></h3>
       	<table class="table table-reflow">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Users Having This Role') ?></th>
             
         <?php foreach ($role->role_id as $ru): ?>
        <tr>
         <th></th>
            <td><?= $this->Html->link($ru->username, ['controller' => 'Users', 'action' => 'view', $ru->id])  ?></td>
            
        </tr>

    <?php endforeach; ?>
    
        </tr>
        <tr>
            <th><?= __('Role Id') ?></th>
            <td><?= $this->Number->format($role->role_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Priority') ?></th>
            <td><?= $this->Number->format($role->priority) ?></td>
        </tr>
    </table>
</div>
