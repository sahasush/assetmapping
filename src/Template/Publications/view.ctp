<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Publication'), ['action' => 'edit', $publication->Publications_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publication'), ['action' => 'delete', $publication->Publications_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $publication->Publications_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Publications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publication'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="publications view large-9 medium-8 columns content">
    <h3><?= h($publication->Publications_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Publication Name') ?></th>
            <td><?= h($publication->Publication_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty LName') ?></th>
            <td><?= h($publication->Faculty_LName) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty FName') ?></th>
            <td><?= h($publication->Faculty_FName) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty MInitial') ?></th>
            <td><?= h($publication->Faculty_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('CSU') ?></th>
            <td><?= h($publication->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 LName') ?></th>
            <td><?= h($publication->Author_1_LName) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 FName') ?></th>
            <td><?= h($publication->Author_1_FName) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 MInitial') ?></th>
            <td><?= h($publication->Author_1_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Author Name 2') ?></th>
            <td><?= h($publication->Author_Name_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Author Name 3') ?></th>
            <td><?= h($publication->Author_Name_3) ?></td>
        </tr>
        <tr>
            <th><?= __('Journal') ?></th>
            <td><?= h($publication->Journal) ?></td>
        </tr>
        <tr>
            <th><?= __('Published Yr') ?></th>
            <td><?= h($publication->Published_Yr) ?></td>
        </tr>
        <tr>
            <th><?= __('Sources') ?></th>
            <td><?= h($publication->Sources) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($publication->Validation) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($publication->Validation_Source) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Exist') ?></th>
            <td><?= h($publication->Valid_Exist) ?></td>
        </tr>
        <tr>
            <th><?= __('Publications ID') ?></th>
            <td><?= $this->Number->format($publication->Publications_ID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Database Accessed') ?></h4>
        <?= $this->Text->autoParagraph(h($publication->Database_Accessed)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other') ?></h4>
        <?= $this->Text->autoParagraph(h($publication->Other)); ?>
    </div>
</div>
