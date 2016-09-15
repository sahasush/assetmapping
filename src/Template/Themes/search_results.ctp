<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Theme'), ['action' => 'edit', $theme->Themes_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Theme'), ['action' => 'delete', $theme->Themes_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->Themes_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themes view large-9 medium-8 columns content">
    <h3><?= h($theme->Themes_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Theme') ?></th>
            <td><?= h($theme->Theme) ?></td>
        </tr>
        <tr>
            <th><?= __('Themes ID') ?></th>
            <td><?= $this->Number->format($theme->Themes_ID) ?></td>
        </tr>
        <tr>
         <th><?= __('Degree Level') ?></th>
        <?php if (!empty($theme->degrees)): ?>
         <td>
                <?php foreach ($theme->degrees as $degree): ?>
                    <li><?= h($degree->Degree_Level) ?> </li>
                <?php endforeach; ?>
            </td>
            <?php else: ?>
            <p>None</p>
        <?php endif; ?>
            </tr>
    </table>
</div>
