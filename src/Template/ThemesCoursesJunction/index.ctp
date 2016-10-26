<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Themes Courses Junction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themesCoursesJunction index large-9 medium-8 columns content">
    <h3><?= __('Themes Courses Junction') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Themes_Courses_Junction_ID') ?></th>
                <th><?= $this->Paginator->sort('Themes_ID') ?></th>
                <th><?= $this->Paginator->sort('Courses_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themesCoursesJunction as $themesCoursesJunction): ?>
            <tr>
                <td><?= $this->Number->format($themesCoursesJunction->Themes_Courses_Junction_ID) ?></td>
                <td><?= $this->Number->format($themesCoursesJunction->Themes_ID) ?></td>
                <td><?= $this->Number->format($themesCoursesJunction->Courses_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $themesCoursesJunction->Themes_Courses_Junction_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $themesCoursesJunction->Themes_Courses_Junction_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $themesCoursesJunction->Themes_Courses_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesCoursesJunction->Themes_Courses_Junction_ID)]) ?>
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
