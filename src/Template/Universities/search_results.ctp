  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<div>
	<h3><?= __('Search Results') ?></h3>
	<br>Showing Resutls for component <b><?=$component  ?> </b>
	
	<!--  Show department data  -->
	
	<?php if (!empty($deptdata)): ?>
     
    
   <table class="table table-reflow">
                
               <tr>
			<th><?= __('Theme') ?></th>
			<td><?= h($deptdata[0]['theme']) ?></td>
		</tr>
		<tr>
			<th><?= __('Department') ?></th>
			<td><?= h($deptdata[0]['Department']) ?></td>
		</tr>
		<tr>
			<th><?= __('College') ?></th>
			<td><?= h($deptdata[0]['College']) ?></td>
		</tr>
		<th><?= __('University') ?></th>
		<td><?= h($deptdata[0]['University']) ?></td>
		</tr>

	</table>

	    </table>
     <?php endif; ?>
    <?php if (!empty($courses)): ?>   

   <table data-toggle="table"  data-sort-name="Course_Title" data-sort-order="asc">

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
                <?php foreach ($courses as $course): ?>
                
                 <tr>
				<td><?= h($course->Course_Title) ?></td>
				<td><?= h($course->Course_Number) ?></td>
				<td><?= h($course->Course_Abbr) ?></td>
				<td><?= h($course->Units) ?></td>
				<td><?= $this->Html->link(__('View'), ['controller'=>'courses','action' => 'view', $course->Courses_ID])?></td> 
			</tr>
                <?php endforeach; ?>
        </td>
		</tbody>
	</table>

     <?php endif; ?>
     <!-- Display Degrees -->
     
     <?php if (!empty($degrees)): ?>
   	  <table data-toggle="table"  data-sort-name="degree_level" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="degree_level" data-sortable="true"><?= __('Degree Level') ?></th>
				<th><?= __('Program Name') ?></th>
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $degrees as $field => $value ) :?>
                             <tr>
								<td><?= h($value['Degree_Level']) ?></td>
								<td><?= h($value['Program_Name']) ?></td>
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     
     	<!--  Show equipment data  -->
     	<?php if (!empty($equipments)): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Brand') ?></th>
				<th><?= __('Model') ?></th>
				<th><?= __('Type') ?></th>
				<th><?= __('Serial_Number') ?></th>
				<th><?= __('Condition') ?></th>
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
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     
     <!--  Show equipment data  -->
     	<?php if (!empty($centers)): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
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
							 
								<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'labscenters','action' => 'view', $center->Labs_Centers_ID])?> </td>
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     <!--  Show Faculty Data -->
     
     	<?php if (!empty($faculties)): ?>
   <table data-toggle="table"  data-sort-name="center_name" data-sort-order="asc">
		<thead>
			<tr>
			
				<th data-field="center_name" data-sortable="true"><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>
				<th><?= __('Faculty') ?></th>
				
					<th class="actions"><?= __('Actions') ?></th>
				
			</tr>
		</thead>
		<tbody>       
                <?php foreach ( $faculties as $faculty ) :?>
                             <tr>
								<td><?= h($faculty['Center_Name']) ?></td>
								<td><?= h($faculty['Center_Type']) ?></td>
							   <td><?= h($faculty['Faculty_Lname']) ?>,<?= h($faculty['Faculty_Fname']) ?>,<?= h($faculty['Faculty_MInitial']) ?></td>
								<td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> </td>
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     
     	
     </div>
     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>