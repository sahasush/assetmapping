<div class="container-fluid">

 <?php if (!empty($labsCenters)): ?>
<div class="posright">
    <ul>
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Labs Center'), ['action' => 'add']) ?></li>
    </ul>
</div>
<br>
<br>
<br>

    
    <h3><?= __('Labs Centers') ?></h3>
   <table class = "table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Labs_Centers_ID') ?></th>
                <th><?= $this->Paginator->sort('Center_Type') ?></th>
                <th><?= $this->Paginator->sort('Center_Name') ?></th>
                <th><?= $this->Paginator->sort('Estbl_Yr') ?></th>
                <th><?= $this->Paginator->sort('Active_Status') ?></th>
                <th><?= $this->Paginator->sort('Contact_1_Lname') ?></th>
                <th><?= $this->Paginator->sort('Contact_1_Fname') ?></th>
                <th><?= $this->Paginator->sort('Contact_1_Minitial') ?></th>
                <th><?= $this->Paginator->sort('Contact_2_Lname') ?></th>
                <th><?= $this->Paginator->sort('Contact_2_Fname') ?></th>
                <th><?= $this->Paginator->sort('Contact_2_Minitial') ?></th>
                <th><?= $this->Paginator->sort('No_of_Researchers') ?></th>
                <th><?= $this->Paginator->sort('No_of_Technicians') ?></th>
                <th><?= $this->Paginator->sort('Lab_Accreditation') ?></th>
                <th><?= $this->Paginator->sort('Time_of_Operation') ?></th>
                <th><?= $this->Paginator->sort('Email') ?></th>
                <th><?= $this->Paginator->sort('Address_1') ?></th>
                <th><?= $this->Paginator->sort('Building_Room') ?></th>
                <th><?= $this->Paginator->sort('Address_2') ?></th>
                <th><?= $this->Paginator->sort('Phone_1') ?></th>
                <th><?= $this->Paginator->sort('Phone_1_Ext') ?></th>
                <th><?= $this->Paginator->sort('Phone_2') ?></th>
                <th><?= $this->Paginator->sort('Phone_2_Desc') ?></th>
                <th><?= $this->Paginator->sort('Web_URL') ?></th>
                <th><?= $this->Paginator->sort('Other') ?></th>
                <th><?= $this->Paginator->sort('Validation') ?></th>
                <th><?= $this->Paginator->sort('Validation_Source') ?></th>
                <th><?= $this->Paginator->sort('Valid_Exist') ?></th>
                <th><?= $this->Paginator->sort('University_ID') ?></th>
                <th><?= $this->Paginator->sort('Colleges_ID') ?></th>
                <th><?= $this->Paginator->sort('Departments_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($labsCenters as $labsCenter): ?>
            <tr>
                <td><?= $this->Number->format($labsCenter->Labs_Centers_ID) ?></td>
                <td><?= h($labsCenter->Center_Type) ?></td>
                <td><?= h($labsCenter->Center_Name) ?></td>
                <td><?= h($labsCenter->Estbl_Yr) ?></td>
                <td><?= h($labsCenter->Active_Status) ?></td>
                <td><?= h($labsCenter->Contact_1_Lname) ?></td>
                <td><?= h($labsCenter->Contact_1_Fname) ?></td>
                <td><?= h($labsCenter->Contact_1_Minitial) ?></td>
                <td><?= h($labsCenter->Contact_2_Lname) ?></td>
                <td><?= h($labsCenter->Contact_2_Fname) ?></td>
                <td><?= h($labsCenter->Contact_2_Minitial) ?></td>
                <td><?= h($labsCenter->No_of_Researchers) ?></td>
                <td><?= h($labsCenter->No_of_Technicians) ?></td>
                <td><?= h($labsCenter->Lab_Accreditation) ?></td>
                <td><?= h($labsCenter->Time_of_Operation) ?></td>
                <td><?= h($labsCenter->Email) ?></td>
                <td><?= h($labsCenter->Address_1) ?></td>
                <td><?= h($labsCenter->Building_Room) ?></td>
                <td><?= h($labsCenter->Address_2) ?></td>
                <td><?= h($labsCenter->Phone_1) ?></td>
                <td><?= h($labsCenter->Phone_1_Ext) ?></td>
                <td><?= h($labsCenter->Phone_2) ?></td>
                <td><?= h($labsCenter->Phone_2_Desc) ?></td>
                <td><?= h($labsCenter->Web_URL) ?></td>
                <td><?= h($labsCenter->Other) ?></td>
                <td><?= h($labsCenter->Validation) ?></td>
                <td><?= h($labsCenter->Validation_Source) ?></td>
                <td><?= h($labsCenter->Valid_Exist) ?></td>
                <td><?= $this->Number->format($labsCenter->University_ID) ?></td>
                <td><?= $this->Number->format($labsCenter->Colleges_ID) ?></td>
                <td><?= $this->Number->format($labsCenter->Departments_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $labsCenter->Labs_Centers_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $labsCenter->Labs_Centers_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $labsCenter->Labs_Centers_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $labsCenter->Labs_Centers_ID)]) ?>
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
    
        <?php endif; ?>
        <?php if (empty($labsCenters)): ?>
        <div class="alert alert-danger">
  			<strong>Warning!<strong> <?= $this->Flash->render() ?>
		</div>
         
         <?php endif; ?>
</div>
