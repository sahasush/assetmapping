<div class="posright">
    <ul >
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Search Universities'), ['action' => 'search']) ?> </li>
    </ul>
</div>
<div class="container">
    <h3><?= __('Universities') ?></h3>
   <table class = "table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('University_ID') ?></th>
                <th><?= $this->Paginator->sort('University') ?></th>
                <th><?= $this->Paginator->sort('Addrss_Line_1') ?></th>
                <th><?= $this->Paginator->sort('Addrss_Line_2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($universities as $university): ?>
            <tr>
                <td><?= $this->Number->format($university->University_ID) ?></td>
                <td><?= h($university->University) ?></td>
                <td><?= h($university->Addrss_Line_1) ?></td>
                <td><?= h($university->Addrss_Line_2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $university->University_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $university->University_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $university->University_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $university->University_ID)]) ?>
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
