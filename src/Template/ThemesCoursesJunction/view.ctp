<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Themes Courses Junction'), ['action' => 'edit', $themesCoursesJunction->Themes_Courses_Junction_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Themes Courses Junction'), ['action' => 'delete', $themesCoursesJunction->Themes_Courses_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesCoursesJunction->Themes_Courses_Junction_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes Courses Junction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Themes Courses Junction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themesCoursesJunction view large-9 medium-8 columns content">
    <h3><?= h($themesCoursesJunction->Themes_Courses_Junction_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Themes Courses Junction ID') ?></th>
            <td><?= $this->Number->format($themesCoursesJunction->Themes_Courses_Junction_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Themes ID') ?></th>
            <td><?= $this->Number->format($themesCoursesJunction->Themes_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Courses ID') ?></th>
            <td><?= $this->Number->format($themesCoursesJunction->Courses_ID) ?></td>
        </tr>
    </table>
</div>
