<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->Departments_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->Departments_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="departments form large-9 medium-8 columns content">
    <?= $this->Form->create($department) ?>
    <fieldset>
        <legend><?= __('Edit Department') ?></legend>
        <?php
            echo $this->Form->input('Department');
            echo $this->Form->input('Colleges_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
