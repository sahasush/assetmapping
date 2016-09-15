<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Centers Faculty Junction'), ['action' => 'edit', $centersFacultyJunction->Centers_Faculty_Junction_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Centers Faculty Junction'), ['action' => 'delete', $centersFacultyJunction->Centers_Faculty_Junction_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $centersFacultyJunction->Centers_Faculty_Junction_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Centers Faculty Junction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Centers Faculty Junction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="centersFacultyJunction view large-9 medium-8 columns content">
    <h3><?= h($centersFacultyJunction->Centers_Faculty_Junction_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Centers Faculty Junction ID') ?></th>
            <td><?= $this->Number->format($centersFacultyJunction->Centers_Faculty_Junction_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Labs Centers ID') ?></th>
            <td><?= $this->Number->format($centersFacultyJunction->Labs_Centers_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty ID') ?></th>
            <td><?= $this->Number->format($centersFacultyJunction->Faculty_ID) ?></td>
        </tr>
    </table>
</div>
