  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<div class="container-fluid">
	
		<?php if ($role == $Admin): ?>

	 <?php endif; ?>

	<h3>Faculty and PublicationDetails</h3>
	
	<table class="table table-reflow">
	  <?php if (in_array("Faculty_ID", $faccolnames)): ?>
      <tr>
			<th><?= __('Faculty ID') ?></th>
			<td><?= h($faculty->Faculty_ID) ?></td>
		</tr>
        <?php endif; ?>
         <tr>
			<th><?= __('Faculty Name') ?></th>
			<td><?= h($this->String->  lnameFirst($faculty->Faculty_Fname ,$faculty->Faculty_MInitial,$faculty->Faculty_Lname) )?></td>
		
		</tr>
		<tr>
			<th><?= __('Theme') ?></th>
			<td><?= h($this->String->  concatenateThemes($facdata,'Theme') )?></td>    
			</td>
		</tr>
		<tr>
			<th><?= __('Department') ?></th>
			<td><?= h($facdata[0]['Department']) ?></td>
		</tr>
		<tr>
			<th><?= __('College') ?></th>
			<td><?= h($facdata[0]['College']) ?></td>
		</tr>
		<tr>
			<th><?= __('University') ?></th>
			<td><?= h($facdata[0]['University']) ?></td>
		</tr>
		 

	</table>

		 <table data-toggle="table"  data-sort-name="Publication_Title"
		data-sort-order="asc"">
			<thead>
			   <tr>
			   
			      <th data-field="Publication_Title" data-sortable="true"><?= __('Publication Title') ?></th>
			       <?php if (in_array("Publications_ID", $colnames)): ?>
			      <th><?= __('Publications_ID') ?></th>
			      <?php endif; ?>
			      <th><?= __('Journal') ?></th>
			      <th><?= __('Campus') ?></th>
			      <th><?= __('First Author Name') ?></th>
			        <th><?= __('Second  Author Name') ?></th>
			          <th><?= __('Third Author Name') ?></th>
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
               
                   <td> <?= h($publication->Publication_Name) ?></td>
                     <?php if (in_array("Publications_ID", $colnames)): ?><td>  <?= h($publication->Publications_ID) ?></td>  <?php endif; ?>
                    <td> <?= h($publication->Journal) ?></td>
                     <td> <?= h($publication->CSU) ?></td>
                     <td><?= h($this->String->  lnameFirst($publication->Author_1_FName ,$publication->Author_1_Minitial,$publication->Author_1_LName) )?></td>
                       <td> <?= h($publication->Author_Name_2 ) ?></td>
                        <td> <?= h($publication->Author_Name_3 ) ?></td>
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


<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>