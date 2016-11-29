
<nav class="posright">
    <ul>
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="container">
    <h3><?= __('Themes') ?></h3>
    <table class = "table table-bordered">
        <thead>
            <tr>
             <?php if (in_array("theme_id", $colnames)): ?>
                <th><?= $this->Paginator->sort('Themes_ID') ?></th>
                 <?php endif; ?>
                <th><?= $this->Paginator->sort('Theme') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themes as $theme): ?>
            <tr>
                
                 <?php if (in_array("theme_id", $colnames)): ?>                
                <td><?= $this->Number->format($theme->Themes_ID) ?></td>
                 <?php endif; ?>
                <td><?= h($theme->Theme) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $theme->Themes_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $theme->Themes_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $theme->Themes_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->Themes_ID)]) ?>
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
