<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersRoleJunction->role_junction_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersRoleJunction->role_junction_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Role Junction'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersRoleJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($usersRoleJunction) ?>
    <fieldset>
        <legend><?= __('Edit Users Role Junction') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('roles_id', ['options' => $roles, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
