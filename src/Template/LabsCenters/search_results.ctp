  <div class='container-fluid'>
  
<button onclick="window.location.href='/labsCenters/search'">Back</button>
<br>
	<h4><?= __('Search Results') ?> for <b><?=ucfirst($component) ?></b> </h4>
	
    
    <!-- Show Grants data-->    
      	<?php if ($component =='grants'): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>
				<?php if (in_array("Grants_ID", $colnames)): ?>
								  <th><?= __('Grants ID') ?></th>			
				<?php endif; ?>		
				<th><?= __('Project Title') ?></th>
				<th><?= __('Research Objectives') ?></th>
				<th><?= __('Grantor') ?></th>
				<th><?= __('Amount Awarded') ?></th>
				<th><?= __('Date Grant Awarded ') ?></th>
				<th><?= __('Date Grant Expires ') ?></th>
				<th><?= __('Principal Investigator')?></th>
				<th><?= __('Other')?></th>
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
				<th class="actions"><?= __('Additional Details') ?></th>				
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $grants as $grant) :?>
                             <tr>
								<td><?= h($grant['Center_Name']) ?></td>
								<td><?= h($grant['Theme']) ?></td>
								<td><?= h($grant['University']) ?></td>
								<td><?= h($grant['College']) ?></td>
								<td><?= h($grant['Department']) ?></td>
								 <?php if (in_array("Grants_ID", $colnames)): ?>
								 <td><?= h($grant['Grants_ID']) ?></td>			
								    <?php endif; ?>		
								<td><?= h($grant['Grant_Project_Title']) ?></td>					
								 <td><?= h($grant['Research_Obj']) ?></td>		
								 <td><?= h($grant['Grantor']) ?></td>	
								 <td><?= h($grant['Grant_Amount']) ?></td>	
								 <td><?= h($this->String-> moYearFormat($grant['Effective_Mo'],$grant['Effective_Yr']) )?></td>	
								 <td><?= h($this->String-> moYearFormat($grant['Expiration_Mo'],$grant['Expiration_Yr']) )?></td>	
								 <td><?= h($this->String-> lnameFirst($grant['PI_FName'],$grant['PI_Minitial'],$grant['PI_LName']))?></td>	
								  <td><?= h($grant['Other']) ?></td>	
								  <?php if (in_array("Sources", $colnames)): ?>
								 			<td><?= h($grant['Sources']) ?></td>			
								    <?php endif; ?>		
								 <?php if (in_array("Validation", $colnames)): ?>
								 		<td><?= h($grant['Validation']) ?></td>			
								    <?php endif; ?>		
								<?php if (in_array("Validation_Source", $colnames)): ?>
								 		<td><?= h($grant['Validation_Source']) ?></td>			
								    <?php endif; ?>
								    <?php if (in_array("Valid_Exist", $colnames)): ?>
								 		<td><?= h($grant['Valid_Exist']) ?></td>			
								    <?php endif; ?>
								<td class="actions"> 
								<?php if (!empty($grant['Grants_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'grants','action' => 'view', $grant['Grants_ID']])?> 
								     <?php endif; ?>								
								</td>
							
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
          
    </table>
     <?php endif; ?>
     <!-- Display Faculty -->
     
     <?php if ($component =='faculty'): ?>
   <table data-toggle="table"  data-sort-name="fac_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="fac_name" data-sortable="true"><?= __('Faculty Name') ?></th>
				 <?php if (in_array("Faculty_ID", $colnames)): ?> 
                <th data-field="faculty_id"  data-sortable="true"><?= __('Faculty ID') ?></th> 
                  <?php endif; ?>         
				<th><?= __('Center Name') ?></th>				
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>			
					<th class="actions"><?= __('Additional Details') ?></th>
					<th class="actions"><?= __('View Publications') ?></th>
				
			</tr>
		</thead>
		<tbody>  
		
                <?php foreach ( $faculties as $faculty ) :?>
    
                             <tr>
                              
                             	<td>								
								<?php if (!empty($faculty['Faculty_ID'])): ?>
								<?= h($this->String->  lnameFirst($faculty['Faculty_Lname'],$faculty['Faculty_MInitial'],$faculty['Faculty_Fname']) )?>						
								<?php else :?>
								--
								 <?php endif; ?>	</td>	
								 
								 <?php if (in_array("Faculty_ID", $colnames)): ?> 
                							<td><?= h($faculty['Faculty_ID']) ?></td>
                 		 <?php endif; ?>     
								<td><?= h($faculty['Center_Name']) ?></td>
								
								<td><?= h($faculty['Theme']) ?></td>
								<td><?= h($faculty['University']) ?></td>
								<td><?= h($faculty['College']) ?></td>
								<td><?= h($faculty['Department']) ?></td>						
								<td class="actions"> 
								<?php if (!empty($faculty['Faculty_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> 
								 <?php endif; ?>	
								</td>
								<td class="actions"> 
								<?php if (!empty($faculty['Faculty_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'viewpublications', $faculty['Faculty_ID']])?> 
								 <?php endif; ?>	
								</td>
										
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          

     <?php endif; ?>
    
     	<!--  Show equipment data  -->
     	<?php if ($component =='equipment'): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>				
                  <?php if (in_array("Equipment_ID", $colnames)): ?> 
                <th data-field="equipment_id"  data-sortable="true"><?= __('Equipment ID') ?></th> 
                  <?php endif; ?>      
				<th><?= __('Brand') ?></th>
				<th><?= __('Model') ?></th>
				<th><?= __('Type') ?></th>
				<th><?= __('Serial Number') ?></th>
				<th><?= __('Description') ?></th>
				<?php if (in_array("Condition", $colnames)): ?> 		
				<th><?= __('Condition') ?></th>
				<?php endif; ?> 
				 <?php if (in_array("Public_Access", $colnames)): ?> 		
					<th><?= __('Public Access') ?></th>
				<?php endif; ?>  
				 <?php if (in_array("Ownrshp_Status", $colnames)): ?> 		
				<th><?= __('Ownership Status') ?></th>
				   <?php endif; ?>      
				<th><?= __('Other') ?></th>				 
				 <?php if (in_array("Validation", $colnames)): ?> 
				<th><?= __('Validation') ?></th>
				 <?php endif; ?>   
					 <?php if (in_array("Validation_Source", $colnames)): ?> 		
				<th><?= __('Validation_Source') ?></th>
				 <?php endif; ?>     
				   <?php if (in_array("Valid_Exist", $colnames)): ?> 
				<th><?= __('Valid_Exist') ?></th>
				 <?php endif; ?>     
				<th class="actions"><?= __('Additional Details') ?></th>				
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $equipments as $equipment ) :?>
                             <tr>
								<td><?= h($equipment['Center_Name']) ?></td>
								   <td><?= h($equipment['Theme']) ?></td>
								<td><?= h($equipment['University']) ?></td>
								<td><?= h($equipment['College']) ?></td>
								<td><?= h($equipment['Department']) ?></td>
								 <?php if (in_array("Equipment_ID", $colnames)): ?> 
                							<td><?= h($equipment['Equipment_ID']) ?></td>
                 				 <?php endif; ?>      
								<td><?= h($equipment['Brand']) ?></td>
								<td><?= h($equipment['Model']) ?></td>
								<td><?= h($equipment['Type']) ?></td>	
								<td><?= h($equipment['Serial_Number']) ?></td>
								<td><?= h($equipment['Description']) ?></td>
								<?php if (in_array("Condition", $colnames)): ?> 							
								<td><?= h($equipment['Condition']) ?></td>	
								 <?php endif; ?>    
								 <?php if (in_array("Public_Access", $colnames)): ?> 		  
										<td><?= h($equipment['Public_Access']) ?></td>	
								 <?php endif; ?>
								 <?php if (in_array("Ownrshp_Status", $colnames)): ?> 		
										<td><?= h($equipment['Ownrshp_Status']) ?></td>	
								 <?php endif; ?>
								<td><?= h($equipment['Other']) ?></td>									
								<?php if (in_array("Validation", $colnames)): ?> 		
								<td><?= h($equipment['Validation']) ?></td>	
								<?php endif; ?>
								 <?php if (in_array("Validation_Source", $colnames)): ?> 		
								<td><?= h($equipment['Validation_Source']) ?></td>	
								<?php endif; ?>
								<?php if (in_array("Valid_Exist", $colnames)): ?> 		
								<td><?= h($equipment['Valid_Exist']) ?></td>	
								<?php endif; ?>
								
								<?php if (!empty($equipment['Equipment_ID'])): ?>
								<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'equipment','action' => 'view', $equipment['Equipment_ID']])?> </td>	
								     <?php endif; ?>								
														
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>

     <?php endif; ?>
     
     <!--  Show center data  -->
     	<?php if (!empty($centers)): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				
			</tr>
		</thead>
		<tbody>  
		<?php $counter=0;?>     
                <?php foreach ( $centers as $center ) :?>
          
                             <tr>
								<td><?= h($center['Center_Name']) ?></td>
								<td><?= h($center['Center_Type']) ?></td>
								<td><?= h($center['Theme']) ?></td>
								<td><?= h($center['University']) ?></td>
								<td><?= h($center['College']) ?></td>
								<td><?= h($center['Department']) ?></td>
								
								<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'labsCenters','action' => 'view', $center['Labs_Centers_ID']])?> </td>
							</tr>
						 <?php $counter=$counter+1;?>
               <?php endforeach; ?>
                </tbody>
             
	</table>
          

     <?php endif; ?>
     </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>