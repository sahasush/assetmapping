<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblColPermission->tbl_col_perm_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblColPermission->tbl_col_perm_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tbl Col Permission'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblColPermission form large-9 medium-8 columns content">
    <?= $this->Form->create($tblColPermission) ?>
    <fieldset>
        <legend><?= __('Edit Tbl Col Permission') ?></legend>
        <?php
            echo $this->Form->input('table_name');
            echo $this->Form->input('col_name');
            echo $this->Form->input('role_id', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
