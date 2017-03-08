
<div class="container">
	  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
		<?php if ($role == $Admin): ?>

	 <?php endif; ?>

	<h3>Faculty Details</h3>
	<table class="table table-reflow">
      <?php if (in_array("Faculty_ID", $colnames)): ?>
      <tr>
			<th><?= __('Faculty ID') ?></th>
			<td><?= h($faculty->Faculty_ID) ?></td>
		</tr>
        <?php endif; ?>
        <tr>
			<th><?= __('Faculty Name') ?></th>
			<td><?= h($this->String->  lnameFirst($faculty->Faculty_Fname  ,$faculty->Faculty_MInitial,$faculty->Faculty_Lname) )?></td>
		</tr>

		<tr>
			<th><?= __('Email') ?></th>
			<td><?= h($faculty->Email) ?></td>
		</tr>
		<tr>
			<th><?= __('Campus') ?></th>
			<td><?= h($faculty->CSU) ?></td>
		</tr>
		<tr>
			<th><?= __('Position') ?></th>
			<td><?= h($faculty->Position) ?></td>
		</tr>
		<tr>
			<th><?= __('Department Affiliation') ?></th>
			<td><?= h($faculty->Dept_Affiliation) ?></td>
		</tr>
		<tr>
			<th><?= __('Address') ?></th>
			<td><?= h($this->String->addressFormat($faculty->Address_Line_1 ,$faculty->Building_Room)) ?><br><?= h($faculty->Address_Line_2) ?></td>
		</tr>
		<tr>
			<th><?= __('Phone Number') ?></th>
			<td><?= h($faculty->Phone_1) ?></td>
		</tr>
		<tr>
			<th><?= __('Phone Extension') ?></th>
			<td><?= h($faculty->Phone_1_Ext) ?></td>
		</tr>
		<tr>
			<th><?= __('Seconardy Phone Number') ?></th>
			<td><?= h($faculty->Phone_2) ?></td>
		</tr>
		<tr>
			<th><?= __('Seconardy Phone Type') ?></th>
			<td><?= h($faculty->Phone_2_Desc) ?></td>
		</tr>
		<tr>
			<th><?= __('Degree') ?></th>
			<td><?= h($faculty->Degree) ?></td>
		</tr>
		<tr>
			<th><?= __('Discipline of Degree') ?></th>
			<td><?= h($faculty->Degree_Discip) ?></td>
		</tr>
    <?php if (in_array("Valid_Exist", $colnames)): ?>
		<tr>
			<th><?= __('Presence Validated') ?></th>
			<td><?= h($faculty->Valid_Exist) ?></td>
		</tr>
		 <?php endif; ?>
		   <?php if (in_array("Faculty ID", $colnames)): ?>
		<tr>
			<th><?= __('Faculty ID') ?></th>
			<td><?= $this->Number->format($faculty->Faculty_ID) ?></td>
		</tr>
		<?php endif; ?>
		<tr>
			<th><?= __('Expertise') ?></th>
			<td><?= $this->Text->autoParagraph(h($faculty->Expertise)); ?></td>
		</tr>
   <?php if (in_array("Validation", $colnames)): ?>
 		<tr>
			<th><?= __('Validation') ?></th>
			<td><?= h($faculty->Validation) ?></td>
		</tr>
            <?php endif; ?>
         <?php if (in_array("Validation_Source", $colnames)): ?>
        <tr>
			<th><?= __('Validation Source') ?></th>
			<td><?= h($faculty->Validation_Source) ?></td>
		</tr>
              <?php endif; ?>
		<tr>
			<th><?= __('Other Information') ?></th>
			<td><?= $this->Text->autoParagraph(h($faculty->Other)); ?></td>
		</tr>
		<tr>
		<tr>
			<th><?= __('Publications') ?></th>
				 <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'viewpublications', $faculty->Faculty_ID])?> </td>
		</tr>
		<tr>
		
	
	
	</table>
       <?php if (in_array("Sources", $colnames)): ?>
         <div class="row">
		<h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($faculty->Sources)); ?>
    </div>
       <?php endif; ?>
</div>
