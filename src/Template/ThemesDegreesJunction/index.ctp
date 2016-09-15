<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Themes Degrees Junction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themesDegreesJunction index large-9 medium-8 columns content">
    <h3><?= __('Themes Degrees Junction') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Themes_Degrees_Junction_ID') ?></th>
                <th><?= $this->Paginator->sort('Themes_ID') ?></th>
                <th><?= $this->Paginator->sort('Degrees_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themesDegreesJunction as $themesDegreesJunction): ?>
            <tr>
                <td><?= $this->Number->format($themesDegreesJunction->Themes_Degrees_Junction_ID) ?></td>
                <td><?= $this->Number->format($themesDegreesJunction->Themes_ID) ?></td>
                <td><?= $this->Number->format($themesDegreesJunction->Degrees_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $themesDegreesJunction->Themes_Degrees_Junction_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $themesDegreesJunction->Themes_Degrees_Junction_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $themesDegreesJunction->Themes_Degrees_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesDegreesJunction->Themes_Degrees_Junction_ID)]) ?>
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
