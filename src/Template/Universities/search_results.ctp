
<button onclick="window.location.href='/universities/search'">Back</button>


<h4><?= __('Search Results') ?> for <b><?=ucfirst($component) ?></b>
	</h3>

	<!--  Show department data  -->
	
	<?php if (!empty($deptdata)): ?>
     
    
   <table class="table table-reflow">
		<tr>
			<th><?= __('Theme') ?></th>
			<td><?= h($this->String->  concatenateThemes($deptdata,'theme') )?></td>
		</tr>
		<tr>
			<th><?= __('Department') ?></th>
			<td><?= h($deptdata[0]['Department']) ?></td>
		</tr>
		<tr>
			<th><?= __('College') ?></th>
			<td><?= h($deptdata[0]['College']) ?></td>
		</tr>
		<tr>
			<th><?= __('University') ?></th>
			<td><?= h($deptdata[0]['University']) ?></td>
		</tr>

	</table>

     <?php endif; ?>
    <?php if ($component=='courses'): ?>   

   <table data-toggle="table" data-sort-name="Course_Title"
		data-sort-order="asc">

		<thead>
			<tr>
				<th data-field="Course_Title" data-sortable="true"><?= __('Course Title') ?></th>
				<th><?= __('Course Number') ?></th>
				<th><?= __('Course Abbr') ?></th>
				<th><?= __('Units') ?></th>
				<th class="actions"><?= __('View More Details') ?></th>
			</tr>
		</thead>
		<tbody>
		<?php if(count($courses) > 0):?>
                <?php foreach ($courses as $course): ?>
                
                 <tr>
				<td><?= h($course->Course_Title) ?></td>
				<td><?= h($course->Course_Number) ?></td>
				<td><?= h($course->Course_Abbr) ?></td>
				<td><?= h($course->Units) ?></td>
				<td><?= $this->Html->link(__('View'), ['controller'=>'courses','action' => 'view', $course->Courses_ID])?></td>
			</tr>
                <?php endforeach; ?>
     <?php else: ?>
      			<tr>
				<td><b>No matching records found.</b></td>
			</tr>
 
               <?php endif; ?>
        
		</tbody>
	</table>

     <?php endif; ?>
     <!-- Display Degrees -->
     
     <?php if (!empty($degrees)): ?>
   	  <table data-toggle="table" data-sort-name="degree_level"
		data-sort-order="asc">
		<thead>
			<tr>
				<?php if (in_array("Degrees_ID", $colnames)): ?>
								  <th><?= __('Degrees ID') ?></th>			
				<?php endif; ?>		
				<th data-field="degree_level" data-sortable="true"><?= __('Degree Level') ?></th>
				<th><?= __('Program Name') ?></th>
				<th><?= __('Description') ?></th>
				<?php if (in_array("Sources", $colnames)): ?>
								  <th><?= __('Sources') ?></th>			
				<?php endif; ?>		
				<th class="actions"><?= __('View More Details') ?></th>
			</tr>
		</thead>
		<tbody>       
		<?php if(count($degrees) > 0):?>
                <?php foreach ( $degrees as $field => $value ) :?>
                             <tr>
                             <?php if (in_array("Degrees_ID", $colnames)): ?>
                             			<td><?= h($value['Degrees_ID']) ?></td>
                             <?php endif; ?>		
				<td><?= h($value['Degree_Level']) ?></td>
				<td><?= h($value['Program_Name']) ?></td>
				<td><?= h($value['Description']) ?></td>
				 <?php if (in_array("Sources", $colnames)): ?>
                             			<td><?= h($value['Sources']) ?></td>
                             <?php endif; ?>	
				<td><?= $this->Html->link(__('View'), ['controller'=>'degrees','action' => 'view', $value['Degrees_ID']])?></td>
			</tr>
						
               <?php endforeach; ?>
               <?php else: ?>
      			<tr>
				<td><b>No matching records found.</b></td>
			</tr> 
               <?php endif; ?>
                </tbody>
	</table>
     <?php endif; ?>
     
     	<!--  Show equipment data  -->
     	<?php if (!empty($equipments)): ?>
   <table data-toggle="table" data-sort-name="center_name"
		data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
									
                  <?php if (in_array("Equipment_ID", $colnames)): ?> 
                <th data-field="equipment_id" data-sortable="true"><?= __('Equipment ID') ?></th> 
                  <?php endif; ?>      
				<th><?= __('Brand') ?></th>
				<th><?= __('Model') ?></th>
				<th><?= __('Type') ?></th>
				<th><?= __('Serial Number') ?></th>
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
				<th class="actions"><?= __('View More Details') ?></th>
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $equipments as $equipment ) :?>
                           
			<tr>
				<td><?= h($equipment->Center_Name) ?></td>
								
								
								 <?php if (in_array("Equipment_ID", $colnames)): ?> 
                							<td><?= h($equipment->Equipment_ID) ?></td>
                 				 <?php endif; ?>      
								<td><?= h($equipment->Brand) ?></td>
				<td><?= h($equipment->Model) ?></td>
				<td><?= h($equipment->Type) ?></td>
				<td><?= h($equipment->Serial_Number) ?></td>
								<?php if (in_array("Condition", $colnames)): ?> 							
								<td><?= h($equipment->Condition) ?></td>	
								 <?php endif; ?>    
								 <?php if (in_array("Public_Access", $colnames)): ?> 		  
										<td><?= h($equipment->Public_Access) ?></td>	
								 <?php endif; ?>
								 <?php if (in_array("Ownrshp_Status", $colnames)): ?> 		
										<td><?= h($equipment->Ownrshp_Status) ?></td>	
								 <?php endif; ?>
								<td><?= h($equipment->Other) ?></td>									
								<?php if (in_array("Validation", $colnames)): ?> 		
								<td><?= h($equipment->Validation) ?></td>	
								<?php endif; ?>
								 <?php if (in_array("Validation_Source", $colnames)): ?> 		
								<td><?= h($equipment->Validation_Source) ?></td>	
								<?php endif; ?>
								<?php if (in_array("Valid_Exist", $colnames)): ?> 		
								<td><?= h($equipment->Valid_Exist) ?></td>	
								<?php endif; ?>
								
								<?php if (!empty($equipment->Equipment_ID)): ?>
								<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'equipment','action' => 'view', $equipment->Equipment_ID])?> </td>	
								     <?php endif; ?>								
														
							</tr>
							
						
               <?php endforeach; ?>
                </tbody>


	</table>
     <?php endif; ?>
     
     <!--  Show centers data  -->
     	<?php if (!empty($centers)): ?>
   <table data-toggle="table" data-sort-name="center_name"
		data-sort-order="asc">
		<thead>
			<tr>
				<?php if (in_array("Labs_Centers_ID", $colnames)): ?> 		
				<th><?= __('Labs Centers ID') ?></th>
				<?php endif; ?> 
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>

				<th class="actions"><?= __('View More Details') ?></th>

			</tr>
		</thead>
		<tbody>       
                 <?php foreach ( $centers as $center ) :?>
                             <tr>
                             <?php if (in_array("Labs_Centers_ID", $colnames)): ?> 		
				<td><?= h($center->Labs_Centers_ID) ?></td>
				<?php endif; ?> 
				<td><?= h($center->Center_Name) ?></td>
				<td><?= h($center->Center_Type) ?></td>

				<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'labsCenters','action' => 'view', $center->Labs_Centers_ID])?> </td>
			</tr>
						
               <?php endforeach; ?>
                </tbody>


	</table>
     <?php endif; ?>
     <!--  Show Faculty Data -->
     
     	<?php if (!empty($faculties)): ?>
   <table data-toggle="table" class="table table-bordered"
		data-sort-name="fac_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="fac_name" data-sortable="true"><?= __('Faculty') ?></th>
				<th><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>
				
				<th class="actions"><?= __('View More Details') ?></th>
				<th class="actions"><?= __('View Publications') ?></th>
			</tr>
		</thead>
		<tbody>  
		<?php if(count($faculties) > 0):?>     
                <?php foreach ( $faculties as $faculty ) :?>
                <?php if(!(empty($faculty['Faculty_ID']) )):?>
                             <tr>
				<td>
                              
               <?= h($this->String->  lnameFirst($faculty['Faculty_Fname'],$faculty['Faculty_MInitial'],$faculty['Faculty_Lname']) )?></td>

				</td>
				<td><?= h($faculty['Center_Name']) ?></td>
				<td><?= h($faculty['Center_Type']) ?></td>
			

				<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> </td>
				<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'viewpublications',$faculty['Faculty_ID']])?> </td>

			</tr>
						<?php endif; ?>
               <?php endforeach; ?>
                
               <?php else: ?>
      			<tr>
				<td><b>No matching records found.</b></td>
			</tr> 
               <?php endif; ?>
            </tbody>


	</table>
     <?php endif; ?>
      <!--  Show University Data -->
     
     	<?php if (!empty($universities)): ?>
   <table data-toggle="table" data-sort-name="center_name"
		data-sort-order="asc">
		<thead>
			<tr>
				<th><?= __('University') ?></th>
				<th><?= __('Address') ?></th>


			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $universities as $univ ) :?>
                             <tr>
				<td><?= h($univ['University']) ?></td>
				<td><?= h($univ['Addrss_Line_1']) ?>,<?= h($univ['Addrss_Line_2']) ?></td>
			</tr>
						
               <?php endforeach; ?>
                </tbody>


	</table>
     <?php endif; ?>

<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>