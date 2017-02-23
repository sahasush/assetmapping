
<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
	<h3><?= __('Search Results') ?></h3>
	<br>Showing Resutls for component <b><?=$component  ?> </b>

	<!--  Show department data  -->
	
	<?php if (!empty($deptdata)): ?>
     
    
   <table class="table table-reflow">
		
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
    <?php if (!empty($courses)): ?>   

   <table data-toggle="table" data-sort-name="Course_Title"  data-sort-order="asc">

		<thead>
			<tr>
				<th data-field="Course_Title" data-sortable="true"><?= __('Course Title') ?></th>
				<th><?= __('Course Number') ?></th>
				<th><?= __('Course Abbr') ?></th>
				<th><?= __('Units') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
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
      			<tr><td><b>No matching records found.</b></td></tr>
 
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
				<th data-field="degree_level" data-sortable="true"><?= __('Degree Level') ?></th>
				<th><?= __('Program Name') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>       
		<?php if(count($degrees) > 0):?>
                <?php foreach ( $degrees as $field => $value ) :?>
                             <tr>
				<td><?= h($value['Degree_Level']) ?></td>
				<td><?= h($value['Program_Name']) ?></td>
				<td><?= $this->Html->link(__('View'), ['controller'=>'degrees','action' => 'view', $value['Degrees_ID']])?></td>
			</tr>
						
               <?php endforeach; ?>
               <?php else: ?>
      			<tr><td><b>No matching records found.</b></td></tr> 
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
				<th><?= __('Brand') ?></th>
				<th><?= __('Model') ?></th>
				<th><?= __('Type') ?></th>
				<th><?= __('Serial_Number') ?></th>
				<th><?= __('Condition') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $equipments as $equipment ) :?>
                             <tr>
				<td><?= h($equipment->Center_Name) ?></td>
				<td><?= h($equipment->Brand) ?></td>
				<td><?= h($equipment->Model) ?></td>
				<td><?= h($equipment->Type) ?></td>
				<td><?= h($equipment->Serial_Number) ?></td>
				<td><?= h($equipment->Condition) ?></td>
				<td><?= $this->Html->link(__('View'), ['controller'=>'equipment','action' => 'view', $equipment->Equipment_ID])?></td>
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

				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>

				<th class="actions"><?= __('Actions') ?></th>

			</tr>
		</thead>
		<tbody>       
                 <?php foreach ( $centers as $center ) :?>
                             <tr>
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
   <table data-toggle="table"   class="table table-bordered" data-sort-name="fac_name" data-sort-order="asc" >
		<thead>
			<tr>
				<th data-field="fac_name" data-sortable="true"><?= __('Faculty') ?></th>
				<th><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>	
				<th><?= __('Theme') ?></th>			
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>  
		<?php if(count($faculties) > 0):?>     
                <?php foreach ( $faculties as $faculty ) :?>
                <?php if(!(empty($faculty['Faculty_ID']) )):?>
                             <tr>
               <td>
                              
               <?= h($this->String->  lnameFirst($faculty['Faculty_Lname'],$faculty['Faculty_MInitial'],$faculty['Faculty_Fname']) )?></td>
                
               </td>
				<td><?= h($faculty['Center_Name']) ?></td>
				<td><?= h($faculty['Center_Type']) ?></td>
				<td><?= h($faculty['Theme']) ?></td>
				   				 
				           <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> </td>
				 
			</tr>
						<?php endif; ?>
               <?php endforeach; ?>
                
               <?php else: ?>
      			<tr><td><b>No matching records found.</b></td></tr> 
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
				<th ><?= __('University') ?></th>
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