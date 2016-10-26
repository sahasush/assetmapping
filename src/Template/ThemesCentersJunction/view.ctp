<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Themes Centers Junction'), ['action' => 'edit', $themesCentersJunction->Themes_Centers_Junction_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Themes Centers Junction'), ['action' => 'delete', $themesCentersJunction->Themes_Centers_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesCentersJunction->Themes_Centers_Junction_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes Centers Junction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Themes Centers Junction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themesCentersJunction view large-9 medium-8 columns content">
    <h3><?= h($themesCentersJunction->Themes_Centers_Junction_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Themes Centers Junction ID') ?></th>
            <td><?= $this->Number->format($themesCentersJunction->Themes_Centers_Junction_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Labs Centers ID') ?></th>
            <td><?= $this->Number->format($themesCentersJunction->Labs_Centers_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Themes ID') ?></th>
            <td><?= $this->Number->format($themesCentersJunction->Themes_ID) ?></td>
        </tr>
    </table>
</div>
