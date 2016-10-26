<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Themes Centers Junction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themesCentersJunction index large-9 medium-8 columns content">
    <h3><?= __('Themes Centers Junction') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Themes_Centers_Junction_ID') ?></th>
                <th><?= $this->Paginator->sort('Labs_Centers_ID') ?></th>
                <th><?= $this->Paginator->sort('Themes_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themesCentersJunction as $themesCentersJunction): ?>
            <tr>
                <td><?= $this->Number->format($themesCentersJunction->Themes_Centers_Junction_ID) ?></td>
                <td><?= $this->Number->format($themesCentersJunction->Labs_Centers_ID) ?></td>
                <td><?= $this->Number->format($themesCentersJunction->Themes_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $themesCentersJunction->Themes_Centers_Junction_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $themesCentersJunction->Themes_Centers_Junction_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $themesCentersJunction->Themes_Centers_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesCentersJunction->Themes_Centers_Junction_ID)]) ?>
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
