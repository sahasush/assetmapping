<nav class="posleft">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Labs Center'), ['action' => 'edit', $labsCenter->Labs_Centers_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Labs Center'), ['action' => 'delete', $labsCenter->Labs_Centers_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $labsCenter->Labs_Centers_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Labs Centers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Labs Center'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">

    <h3>Lab Center ID:<?= h($labsCenter->Labs_Centers_ID) ?></h3>
    <table class="table table-reflow">
	<div style="word-wrap: break-word; width: 800px">
        <tr>
            <th scope="row"><?= __('Center Type') ?></th>
            <td><?= h($labsCenter->Center_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Center Name') ?></th>
            <td><?= h($labsCenter->Center_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estbl Yr') ?></th>
            <td><?= h($labsCenter->Estbl_Yr) ?></td>
        </tr>
        <tr>
            <th><?= __('Active Status') ?></th>
            <td><?= h($labsCenter->Active_Status) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 1 Lname') ?></th>
            <td><?= h($labsCenter->Contact_1_Lname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 1 Fname') ?></th>
            <td><?= h($labsCenter->Contact_1_Fname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 1 Minitial') ?></th>
            <td><?= h($labsCenter->Contact_1_Minitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 2 Lname') ?></th>
            <td><?= h($labsCenter->Contact_2_Lname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 2 Fname') ?></th>
            <td><?= h($labsCenter->Contact_2_Fname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact 2 Minitial') ?></th>
            <td><?= h($labsCenter->Contact_2_Minitial) ?></td>
        </tr>
        <tr>
            <th><?= __('No Of Researchers') ?></th>
            <td><?= h($labsCenter->No_of_Researchers) ?></td>
        </tr>
        <tr>
            <th><?= __('No Of Technicians') ?></th>
            <td><?= h($labsCenter->No_of_Technicians) ?></td>
        </tr>
        <tr>
            <th><?= __('Lab Accreditation') ?></th>
            <td><?= h($labsCenter->Lab_Accreditation) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Of Operation') ?></th>
            <td><?= h($labsCenter->Time_of_Operation) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($labsCenter->Email) ?></td>
        </tr>
        <tr>
            <th><?= __('Address 1') ?></th>
            <td><?= h($labsCenter->Address_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Building Room') ?></th>
            <td><?= h($labsCenter->Building_Room) ?></td>
        </tr>
        <tr>
            <th><?= __('Address 2') ?></th>
            <td><?= h($labsCenter->Address_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 1') ?></th>
            <td><?= h($labsCenter->Phone_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 1 Ext') ?></th>
            <td><?= h($labsCenter->Phone_1_Ext) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 2') ?></th>
            <td><?= h($labsCenter->Phone_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone 2 Desc') ?></th>
            <td><?= h($labsCenter->Phone_2_Desc) ?></td>
        </tr>
        <tr>
            <th><?= __('Web URL') ?></th>
            <td><?= h($labsCenter->Web_URL) ?></td>
        </tr>
        <tr>
            <th><?= __('Other') ?></th>
            <td><?= h($labsCenter->Other) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($labsCenter->Validation) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($labsCenter->Validation_Source) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Exist') ?></th>
            <td><?= h($labsCenter->Valid_Exist) ?></td>
        </tr>
        <tr>
            <th><?= __('Labs Centers ID') ?></th>
            <td><?= $this->Number->format($labsCenter->Labs_Centers_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($labsCenter->University_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Colleges ID') ?></th>
            <td><?= $this->Number->format($labsCenter->Colleges_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Departments ID') ?></th>
            <td><?= $this->Number->format($labsCenter->Departments_ID) ?></td>
        <tr>
		 <th><?= __('Faculty Name') ?></th>
		 <td>
        <?php if (!empty($labsCenter->faculty)): ?>
		
		
           
                <?php foreach ($labsCenter->faculty as $user): ?>
                    <li><?= h($user->Faculty_Fname) ?> <?= h($user->Faculty_Lname) ?></li>
                <?php endforeach; ?>
            
        <?php else: ?>
            <p>No data found</p>
        <?php endif; ?>
        </td>
		</tr>
		</div>
		
		
    </table>
    <div class="row">
        <h4><?= __('Research Area') ?></h4>
        <?= $this->Text->autoParagraph(h($labsCenter->Research_Area)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($labsCenter->Sources)); ?>
    </div>
	

        
       
        
 
	
	
	
</div>
