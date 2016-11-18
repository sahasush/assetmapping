<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faculty'), ['action' => 'edit', $faculty->Faculty_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faculty'), ['action' => 'delete', $faculty->Faculty_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $faculty->Faculty_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Faculty'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faculty'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">

    <h3><?= h($faculty->Faculty_ID) ?></h3>
      <table class="table table-reflow">
        <tr>
            <th><?= __('Faculty Fname') ?></th>
            <td><?= h($faculty->Faculty_Fname) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty Lname') ?></th>
            <td><?= h($faculty->Faculty_Lname) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty MInitial') ?></th>
            <td><?= h($faculty->Faculty_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($faculty->Email) ?></td>
        </tr>
        <tr>
            <th><?= __('CSU') ?></th>
            <td><?= h($faculty->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= h($faculty->Position) ?></td>
        </tr>
        <tr>
            <th><?= __('Dept Affiliation') ?></th>
            <td><?= h($faculty->Dept_Affiliation) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Line 1') ?></th>
            <td><?= h($faculty->Address_Line_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Building Room') ?></th>
            <td><?= h($faculty->Building_Room) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Line 2') ?></th>
            <td><?= h($faculty->Address_Line_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 1') ?></th>
            <td><?= h($faculty->Phone_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 1 Ext') ?></th>
            <td><?= h($faculty->Phone_1_Ext) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 2') ?></th>
            <td><?= h($faculty->Phone_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 2 Desc') ?></th>
            <td><?= h($faculty->Phone_2_Desc) ?></td>
        </tr>
        <tr>
            <th><?= __('Degree') ?></th>
            <td><?= h($faculty->Degree) ?></td>
        </tr>
        <tr>
            <th><?= __('Degree Discip') ?></th>
            <td><?= h($faculty->Degree_Discip) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($faculty->Validation) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($faculty->Validation_Source) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Exist') ?></th>
            <td><?= h($faculty->Valid_Exist) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty ID') ?></th>
            <td><?= $this->Number->format($faculty->Faculty_ID) ?></td>
        </tr>
  
<tr>
        <th><?= __('Expertise') ?></th>
        <td><?= $this->Text->autoParagraph(h($faculty->Expertise)); ?></td>
</tr>
<tr>
        <th><?= __('Other') ?></th>
        <td><?= $this->Text->autoParagraph(h($faculty->Other)); ?></td>
</tr>
<tr>
 
      </table>
      
         <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($faculty->Sources)); ?>
    </div>
</div>
