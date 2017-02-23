  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

<br>
<br>
	<h3><?= __('Search Results') ?></h3>
	<br>Showing Resutls for component <b><?=$component  ?> </b>
	
    
    
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
				<th><?= __('Project Title') ?></th>
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
								<td><?= h($grant['Grant_Project_Title']) ?></td>					
								
								
								<td class="actions"> 
								<?php if (!empty($grant['Grants_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'grants','action' => 'view', $grant['Grants_ID']])?> 
								     <?php endif; ?>								
								</td>
							
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     <!-- Display Faculty -->
     
     <?php if ($component =='faculty'): ?>
   <table data-toggle="table"  data-sort-name="fac_name" data-sort-order="asc">
		<thead>
			<tr>
				<th data-field="fac_name" data-sortable="true"><?= __('Faculty Name') ?></th>
				<th><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>
			
					<th class="actions"><?= __('Actions') ?></th>
				
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
								<td><?= h($faculty['Center_Name']) ?></td>
								<td><?= h($faculty['Center_Type']) ?></td>
								<td><?= h($faculty['Theme']) ?></td>
								<td><?= h($faculty['University']) ?></td>
								<td><?= h($faculty['College']) ?></td>
								<td><?= h($faculty['Department']) ?></td>						
								<td class="actions"> 
								<?php if (!empty($faculty['Faculty_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> 
								 <?php endif; ?>	
								</td>
										
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
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
				<th><?= __('Brand') ?></th>
				<th><?= __('Type') ?></th>
				<th class="actions"><?= __('Actions') ?></th>				
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
								<td><?= h($equipment['Brand']) ?></td>
								<td><?= h($equipment['Type']) ?></td>
								
								
								<td class="actions"> 
								<?php if (!empty($equipment['Equipment_ID'])): ?>
								<?= $this->Html->link(__('View'), ['controller'=>'equipment','action' => 'view', $equipment['Equipment_ID']])?> 
								     <?php endif; ?>								
								</td>
							
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
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
          
    </table>
     <?php endif; ?>
     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>