<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->Departments_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->Departments_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $department->Departments_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departments view large-9 medium-8 columns content">
    <h3><?= h($department->Departments_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($department->Department) ?></td>
        </tr>
        <tr>
            <th><?= __('Departments ID') ?></th>
            <td><?= $this->Number->format($department->Departments_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Colleges ID') ?></th>
            <td><?= $this->Number->format($department->Colleges_ID) ?></td>
        </tr>
    </table>
</div>
