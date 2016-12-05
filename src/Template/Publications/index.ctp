<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Publication'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publications index large-9 medium-8 columns content">
    <h3><?= __('Publications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Publications_ID') ?></th>
                <th><?= $this->Paginator->sort('Publication_Name') ?></th>
                <th><?= $this->Paginator->sort('Faculty_LName') ?></th>
                <th><?= $this->Paginator->sort('Faculty_FName') ?></th>
                <th><?= $this->Paginator->sort('Faculty_MInitial') ?></th>
                <th><?= $this->Paginator->sort('CSU') ?></th>
                <th><?= $this->Paginator->sort('Author_1_LName') ?></th>
                <th><?= $this->Paginator->sort('Author_1_FName') ?></th>
                <th><?= $this->Paginator->sort('Author_1_MInitial') ?></th>
                <th><?= $this->Paginator->sort('Author_Name_2') ?></th>
                <th><?= $this->Paginator->sort('Author_Name_3') ?></th>
                <th><?= $this->Paginator->sort('Journal') ?></th>
                <th><?= $this->Paginator->sort('Published_Yr') ?></th>
                <th><?= $this->Paginator->sort('Sources') ?></th>
                <th><?= $this->Paginator->sort('Validation') ?></th>
                <th><?= $this->Paginator->sort('Validation_Source') ?></th>
                <th><?= $this->Paginator->sort('Valid_Exist') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publications as $publication): ?>
            <tr>
                <td><?= $this->Number->format($publication->Publications_ID) ?></td>
                <td><?= h($publication->Publication_Name) ?></td>
                <td><?= h($publication->Faculty_LName) ?></td>
                <td><?= h($publication->Faculty_FName) ?></td>
                <td><?= h($publication->Faculty_MInitial) ?></td>
                <td><?= h($publication->CSU) ?></td>
                <td><?= h($publication->Author_1_LName) ?></td>
                <td><?= h($publication->Author_1_FName) ?></td>
                <td><?= h($publication->Author_1_MInitial) ?></td>
                <td><?= h($publication->Author_Name_2) ?></td>
                <td><?= h($publication->Author_Name_3) ?></td>
                <td><?= h($publication->Journal) ?></td>
                <td><?= h($publication->Published_Yr) ?></td>
                <td><?= h($publication->Sources) ?></td>
                <td><?= h($publication->Validation) ?></td>
                <td><?= h($publication->Validation_Source) ?></td>
                <td><?= h($publication->Valid_Exist) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $publication->Publications_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publication->Publications_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $publication->Publications_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $publication->Publications_ID)]) ?>
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
