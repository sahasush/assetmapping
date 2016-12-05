<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grant'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grants index large-9 medium-8 columns content">
    <h3><?= __('Grants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Grants_ID') ?></th>
                <th><?= $this->Paginator->sort('Center_Name') ?></th>
                <th><?= $this->Paginator->sort('CSU') ?></th>
                <th><?= $this->Paginator->sort('Grant_Project_Title') ?></th>
                <th><?= $this->Paginator->sort('Grantor') ?></th>
                <th><?= $this->Paginator->sort('Grant_Amount') ?></th>
                <th><?= $this->Paginator->sort('Effective_Yr') ?></th>
                <th><?= $this->Paginator->sort('Effective_Mo') ?></th>
                <th><?= $this->Paginator->sort('Expiration_Yr') ?></th>
                <th><?= $this->Paginator->sort('Expiration_Mo') ?></th>
                <th><?= $this->Paginator->sort('PI_Fname') ?></th>
                <th><?= $this->Paginator->sort('PI_Lname') ?></th>
                <th><?= $this->Paginator->sort('PI_MInitial') ?></th>
                <th><?= $this->Paginator->sort('Validation') ?></th>
                <th><?= $this->Paginator->sort('Validation_Source') ?></th>
                <th><?= $this->Paginator->sort('Valid_Exist') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grants as $grant): ?>
            <tr>
                <td><?= $this->Number->format($grant->Grants_ID) ?></td>
                <td><?= h($grant->Center_Name) ?></td>
                <td><?= h($grant->CSU) ?></td>
                <td><?= h($grant->Grant_Project_Title) ?></td>
                <td><?= h($grant->Grantor) ?></td>
                <td><?= $this->Number->format($grant->Grant_Amount) ?></td>
                <td><?= h($grant->Effective_Yr) ?></td>
                <td><?= h($grant->Effective_Mo) ?></td>
                <td><?= h($grant->Expiration_Yr) ?></td>
                <td><?= h($grant->Expiration_Mo) ?></td>
                <td><?= h($grant->PI_Fname) ?></td>
                <td><?= h($grant->PI_Lname) ?></td>
                <td><?= h($grant->PI_MInitial) ?></td>
                <td><?= h($grant->Validation) ?></td>
                <td><?= h($grant->Validation_Source) ?></td>
                <td><?= h($grant->Valid_Exist) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grant->Grants_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grant->Grants_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grant->Grants_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $grant->Grants_ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
