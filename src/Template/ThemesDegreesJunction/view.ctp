<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Themes Degrees Junction'), ['action' => 'edit', $themesDegreesJunction->Themes_Degrees_Junction_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Themes Degrees Junction'), ['action' => 'delete', $themesDegreesJunction->Themes_Degrees_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $themesDegreesJunction->Themes_Degrees_Junction_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes Degrees Junction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Themes Degrees Junction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themesDegreesJunction view large-9 medium-8 columns content">
    <h3><?= h($themesDegreesJunction->Themes_Degrees_Junction_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Themes Degrees Junction ID') ?></th>
            <td><?= $this->Number->format($themesDegreesJunction->Themes_Degrees_Junction_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Themes ID') ?></th>
            <td><?= $this->Number->format($themesDegreesJunction->Themes_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Degrees ID') ?></th>
            <td><?= $this->Number->format($themesDegreesJunction->Degrees_ID) ?></td>
        </tr>
    </table>
</div>
