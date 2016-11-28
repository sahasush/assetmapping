<p align='right'><b>Logged in as <?=$username?></b></p>
<div class="container">

 <nav class="posright">

    <ul>
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Labs Center'), ['action' => 'edit', $labsCenter->Labs_Centers_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Labs Center'), ['action' => 'delete', $labsCenter->Labs_Centers_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $labsCenter->Labs_Centers_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Labs Centers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Labs Center'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
 

<h3>Lab Center Details </h3>
    <table class="table table-reflow">
	<div style="word-wrap: break-word; width: 800px">
	 <?php if (in_array("Labs_Centers_ID", $colnames)): ?>
	    <tr>
	    <th scope="row"><?= __('Lab Center ID') ?></th>
            <td><?= h($labsCenter->Labs_Centers_ID) ?></td>
	    
	    </tr>
	 <?php endif; ?>
        <tr>
            <th scope="row"><?= __('Center Type') ?></th>
            <td><?= h($labsCenter->Center_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Center Name') ?></th>
            <td><?= h($labsCenter->Center_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year Established') ?></th>
            <td><?= h($labsCenter->Estbl_Yr) ?></td>
        </tr>
        <?php if (in_array("Active_Status", $colnames)): ?>
        <tr>
            <th><?= __('Active Status') ?></th>
            <td><?= h($labsCenter->Active_Status) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?= __('Primary Contact Name') ?></th>
            <td><?= h($labsCenter->Contact_1_Lname) ?> , <?= h($labsCenter->Contact_1_Fname) ?>  ,  <?= h($labsCenter->Contact_1_Minitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contact Name') ?></th>
            <td><?= h($labsCenter->Contact_2_Fname) ?> , <?= h($labsCenter->Contact_2_Lname) ?> , <?= h($labsCenter->Contact_2_Minitial) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Number Of Researchers') ?></th>
            <td><?= h($labsCenter->No_of_Researchers) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Of Technicians') ?></th>
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
            <th><?= __('Address') ?></th>
            <td><?= h($labsCenter->Address_1) ?> , <?= h($labsCenter->Building_Room) ?> <br> <?= h($labsCenter->Address_2) ?>
            </td>
        </tr>
        
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= h($labsCenter->Phone_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Extension') ?></th>
            <td><?= h($labsCenter->Phone_1_Ext) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Phone Number') ?></th>
            <td><?= h($labsCenter->Phone_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Phone Type') ?></th>
            <td><?= h($labsCenter->Phone_2_Desc) ?></td>
        </tr>
        <tr>
            <th><?= __('URL') ?></th>
            <td><?= h($labsCenter->Web_URL) ?></td>
        </tr>
        
         <?php if (in_array("Validation", $colnames)): ?>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($labsCenter->Validation) ?></td>
        </tr>
         <?php endif; ?>
          <?php if (in_array("Validation_Source", $colnames)): ?>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($labsCenter->Validation_Source) ?></td>
        </tr>
        	<?php endif; ?>
        	<?php if (in_array("Valid_Exist", $colnames)): ?>
        <tr>
            <th><?= __('Presence Validated') ?></th>
            <td><?= h($labsCenter->Valid_Exist) ?></td>
        </tr>
        <?php endif; ?>
        <?php if (in_array("Other", $colnames)): ?>
        <tr>
            <th><?= __('Other Information') ?></th>
            <td><?= h($labsCenter->Other) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?= __('University') ?></th>
             <td><?= h($labsCenter->university->University) ?> </td>
        </tr>
        <?php if (in_array("University_Id", $colnames)): ?>
        <tr>
            <th><?= __('University Id') ?></th>
            <td><?= h($labsCenter->University_ID) ?></td>
        </tr>
        <?php endif; ?>
        
        
        <tr>
            <th><?= __('Colleges') ?></th>
            <td><?= h($labsCenter->college->College) ?> </td>
        </tr>
        
         <?php if (in_array("Colleges_Id", $colnames)): ?>
        <tr>
            <th><?= __('Colleges Id') ?></th>
            <td><?= h($labsCenter->Colleges_ID) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?= __('Department') ?></th>
            <td>
            <?php if (!empty($labsCenter->department)): ?>
                    <?= h($labsCenter->department->Department) ?> 
              <?php endif; ?>
            </td>
           <tr>
           <?php if (in_array("Departments_Id", $colnames)): ?>
        <tr>
            <th><?= __('Departments Id') ?></th>
            <td><?= h($labsCenter->Departments_ID) ?></td>
        </tr>
        <?php endif; ?>
		 <th><?= __('Faculty Name') ?></th>
		 <td>
        <?php if (!empty($labsCenter->faculty)): ?>
		
           
                <?php foreach ($labsCenter->faculty as $user): ?>
                    <li><?= h($user->Faculty_Fname) ?> <?= h($user->Faculty_Lname) ?></li>
                <?php endforeach; ?>
            
        <?php else: ?>
            <p>-</p>
        <?php endif; ?>
        </td>
		</tr>
		</div>
		
		
    </table>
    <div class="row">
        <h4><?= __('Research Area') ?></h4>
        <?= $this->Text->autoParagraph(h($labsCenter->Research_Area)); ?>
    </div>
    	 <?php if (in_array("Sources", $colnames)): ?>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($labsCenter->Sources)); ?>
    </div>
     <?php endif; ?>
	 	
</div>
 <div class="col-sm-4">
                    <h5 id='footer-header'> Footer</h3>
                   
  </div>    

            
