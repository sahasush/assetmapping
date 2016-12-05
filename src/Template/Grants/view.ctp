<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grant'), ['action' => 'edit', $grant->Grants_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grant'), ['action' => 'delete', $grant->Grants_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $grant->Grants_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Grants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grant'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grants view large-9 medium-8 columns content">
    <h3><?= h($grant->Grants_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Center Name') ?></th>
            <td><?= h($grant->Center_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('CSU') ?></th>
            <td><?= h($grant->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Grant Project Title') ?></th>
            <td><?= h($grant->Grant_Project_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Grantor') ?></th>
            <td><?= h($grant->Grantor) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Yr') ?></th>
            <td><?= h($grant->Effective_Yr) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Mo') ?></th>
            <td><?= h($grant->Effective_Mo) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration Yr') ?></th>
            <td><?= h($grant->Expiration_Yr) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration Mo') ?></th>
            <td><?= h($grant->Expiration_Mo) ?></td>
        </tr>
        <tr>
            <th><?= __('PI Fname') ?></th>
            <td><?= h($grant->PI_Fname) ?></td>
        </tr>
        <tr>
            <th><?= __('PI Lname') ?></th>
            <td><?= h($grant->PI_Lname) ?></td>
        </tr>
        <tr>
            <th><?= __('PI MInitial') ?></th>
            <td><?= h($grant->PI_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($grant->Validation) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($grant->Validation_Source) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Exist') ?></th>
            <td><?= h($grant->Valid_Exist) ?></td>
        </tr>
        <tr>
            <th><?= __('Grants ID') ?></th>
            <td><?= $this->Number->format($grant->Grants_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Grant Amount') ?></th>
            <td><?= $this->Number->format($grant->Grant_Amount) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Research Obj') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Research_Obj)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Other)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Sources)); ?>
    </div>
</div>
