  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<div class="container-fluid">
	
		<?php if ($role == $Admin): ?>

	 <?php endif; ?>

	<h3>Faculty and PublicationDetails</h3>
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
		</table>
		<table class="table table-bordered">
			<thead>
			   <tr>
			    <?php if (in_array("Publications_ID", $colnames)): ?>
			      <th><?= __('Publications_ID') ?></th>
			      <?php endif; ?>
			      <th><?= __('Publication Title') ?></th>
			      <th><?= __('Faculty Name') ?></th>
			      <th><?= __('Journal') ?></th>
			      <th><?= __('Campus') ?></th>
			      <th><?= __('Year Published') ?></th>
			      <th><?= __('Other') ?></th>
			      <?php if (in_array("Database_Accessed", $colnames)): ?>
			      <th><?= __('Database Accessed') ?></th>
			      <?php endif; ?>
			       <?php if (in_array("Sources", $colnames)): ?>
			      <th><?= __('Sources') ?></th>
			       <?php endif; ?>
			        <?php if (in_array("Validation", $colnames)): ?>
			      <th><?= __('Validation') ?></th>
			      <?php endif; ?>
			     
			       <?php if (in_array("Validation_Source", $colnames)): ?>
			      <th><?= __('Validation Source') ?></th>
			       <?php endif; ?>
			       <?php if (in_array("Valid_Exist", $colnames)): ?>
			      <th><?= __('Presence Validated') ?></th>
			       <?php endif; ?>
			   </tr>
			</thead>
			<tbody>
		
	<?php if (!empty($faculty->publications)): ?>		
          
                <?php foreach ($faculty->publications as $publication): ?>
                 <tr>	
                  <?php if (in_array("Publications_ID", $colnames)): ?><td>  <?= h($publication->Publications_ID) ?></td>  <?php endif; ?>
                   <td> <?= h($publication->Publication_Name) ?></td>
                   <td> <?= h($publication->Faculty_LName) ?>,<?= h($publication->Faculty_FName)?>
                   <?php if (!empty($publication->Faculty_MInitial)): ?>
                   ,<?= h($publication->Faculty_MInitial) ?>                   
                   <?php endif; ?>
                   </td>
                    <td> <?= h($publication->Journal) ?></td>
                     <td> <?= h($publication->CSU) ?></td>
                     <td> <?= h($publication->Published_Yr) ?></td>
                      <td> <?= h($publication->Other) ?></td>
                      <?php if (in_array("Database_Accessed", $colnames)): ?><td> <?= h($publication->Database_Accessed) ?></td><?php endif; ?>
						<?php if (in_array("Sources", $colnames)): ?><td> <?= h($publication->Sources) ?></td><?php endif; ?>
						<?php if (in_array("Validation", $colnames)): ?><td> <?= h($publication->Validation) ?></td><?php endif; ?>
						<?php if (in_array("Validation_Source", $colnames)): ?><td> <?= h($publication->Validation_Source) ?></td><?php endif; ?>
						<?php if (in_array("Valid_Exist", $colnames)): ?><td> <?= h($publication->Valid_Exist) ?></td><?php endif; ?>
                <?php endforeach; ?>            
        <?php else: ?>
            <tr><td>No matching records found</td></tr>
        <?php endif; ?>
       
           
	</table>
</div>
