
<div class="container-fluid">
<nav class="posright">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New College'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<br>
<br>
    <h3><?= __('Colleges') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Colleges_ID') ?></th>
                <th><?= $this->Paginator->sort('College') ?></th>
                <th><?= $this->Paginator->sort('University_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colleges as $college): ?>
            <tr>
                <td><?= $this->Number->format($college->Colleges_ID) ?></td>
                <td><?= h($college->College) ?></td>
                <td><?= $this->Number->format($college->University_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $college->Colleges_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $college->Colleges_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $college->Colleges_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $college->Colleges_ID)]) ?>
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
