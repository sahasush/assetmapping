  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<br>
	<h3><?= __('Search Results') ?></h3>
	<br>Showing Resutls for component <b><?=$component  ?> </b>
	
    
    
    
     <!-- Display Faculty -->
     
     <?php if (!empty($facdata)): ?>
   <table class = "table table-bordered">
		<thead>
			<tr>
				
				<th><?= __('Faculty Name') ?></th>
				<th ><?= __('Center Name') ?></th>
				<th><?= __('Center Type') ?></th>
				<th><?= __('Theme') ?></th>
				<th><?= __('University') ?></th>
				<th><?= __('College') ?></th>
				<th><?= __('Department') ?></th>
				<th class="actions"><?= __('Additional Details') ?></th>
					<th class="actions"><?= __('View Publications') ?></th>
				
			</tr>
		</thead>
		<tbody>  
		
                <?php foreach ( $facdata as $faculty ) :?>
          
                             <tr>
                                <td><?= h($this->String->  lnameFirst($faculty['Faculty_Lname'] ,$faculty['Faculty_MInitial'],$faculty['Faculty_Fname'])) ?></td>			
								<td><?= h($faculty['Center_Name']) ?></td>
								<td><?= h($faculty['Center_Type']) ?></td>
								<td><?= h($faculty['Theme']) ?></td>
								<td><?= h($faculty['University']) ?></td>
								<td><?= h($faculty['College']) ?></td>
								<td><?= h($faculty['Department']) ?></td>
								<td class="actions"> <?= $this->Html->link(__('View Faculty'), ['controller'=>'faculty','action' => 'view', $faculty['Faculty_ID']])?> </td>		
								<td class="actions"> <?= $this->Html->link(__('View Publications'), ['controller'=>'faculty','action' => 'viewpublications', $faculty['Faculty_ID']])?> </td>
							</tr>
						
               <?php endforeach; ?>
                </tbody>
             
	</table>
          
    </table>
     <?php endif; ?>
     
     
     	

     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>