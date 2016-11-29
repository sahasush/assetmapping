<div class="container">
<nav class="posright">
    <ul >
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Theme'), ['action' => 'edit', $theme->Themes_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Theme'), ['action' => 'delete', $theme->Themes_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->Themes_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
    <h3>Theme Detail</h3>
   	<table class="table table-reflow">
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
          <td>
        <?php if (!empty($theme->degrees)): ?>
        
                <?php foreach ($theme->degrees as $degree): ?>
                    <li><?= h($degree->Degree_Level) ?>-<?= h($degree->Program_Name) ?> </li>
                <?php endforeach; ?>
            
            <?php else: ?>
            <p>--</p>
        <?php endif; ?>
        </td>
            </tr>
    </table>
</div>
