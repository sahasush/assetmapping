  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<br>

    <h4><?= __('Search Results') ?> by <b><?=ucfirst($component) ?></b> by <?= h($theme->Theme) ?> Theme</h3>
     
     <!--  Theme dept degree data -->
     <?php if ($component=='degree'): ?>
    
  <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
           
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
             
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
            
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>    
               
                <th data-field="degree_level"  data-sortable="true"><?= __('Degree Level') ?></th>   
              <th data-field="program_name"  data-sortable="true"><?= __('Program Name') ?></th>   
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($degrees as $key=>$values): ?>
                 <tr>
                  
                 <td><?= h($values['University']) ?></td>    
                  
                 <td><?= h($values['College']) ?></td>  
                 
                 <td><?= h($values['Department']) ?></td>  
                
                  <td><?= h($values['Degree_Level']) ?></td>
                 <td><?= h($values['Program_Name']) ?></td>               
                  
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
    
    <?php if ($component=='courses'): ?>
    <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
            <th data-field="theme"  data-sortable="true"><?= __('Theme') ?></th>    
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>    
                <th data-field="course_title"  data-sortable="true"><?= __('Course Title') ?></th>   
              <th data-field="course_number"  data-sortable="true"><?= __('Course Number') ?></th>   
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($courses as $key=>$values): ?>
                 <tr>
                 <td><?= h($values['theme'] )?></td>
                 <td><?= h($values['University']) ?></td>    
                 <td><?= h($values['College']) ?></td>  
                 <td><?= h($values['Department']) ?></td>  
                  <td><?= h($values['Course_Title']) ?></td>
                 <td><?= h($values['Course_Number']) ?></td>               
                  
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
     <!-- Display Labs Centers -->
     <?php if ($component=='centers'): ?>
    <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
            <th data-field="theme"  data-sortable="true"><?= __('Theme') ?></th>    
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>    
                <th data-field="center_name"  data-sortable="true"><?= __('Center Name') ?></th>   
              <th data-field="center_type"  data-sortable="true"><?= __('Center Type') ?></th>   
               <th class="actions"><?= __('Additional Details') ?></th>
               
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($centers as $key=>$values): ?>
                 <tr>
                 <td><?= h($values['theme'] )?></td>
                 <td><?= h($values['University']) ?></td>    
                 <td><?= h($values['College']) ?></td>  
                 <td><?= h($values['Department']) ?></td>  
                  <td><?= h($values['center_name']) ?></td>
                 <td><?= h($values['center_type']) ?></td>
                 <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'labsCenters','action' => 'view', $values['labs_centers_id']])?> </td>               
                        
                  
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
     <!--  Display Faculty -->
    <?php if ($component=='faculty'): ?>
    <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
          
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>    
                <th data-field="faculty_name"  data-sortable="true"><?= __('Faculty Name') ?></th>   
              <th data-field="position"  data-sortable="true"><?= __('Position') ?></th>   
              <th data-field="center_name"  data-sortable="true"><?= __('Center Name') ?></th>   
                <th class="actions"><?= __('Additional Info') ?></th>
                <th class="actions"><?= __('Publications') ?></th>
   
               
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($faculties as $key=>$values): ?>
                 <tr>
                 
                 <td><?= h($values['University']) ?></td>    
                 <td><?= h($values['College']) ?></td>  
                 <td><?= h($values['Department']) ?></td>  
                 <td><?= h($this->String->  lnameFirst($values['Faculty_Lname']   ,$values['Faculty_MInitial'],$values['Faculty_Fname']) )?></td>                 
                   <td><?= h($values['Position']) ?></td>
                  <td><?= h($values['Center_Name']) ?></td>
                  <td class="actions"> <?= $this->Html->link(__('View Faculty'), ['controller'=>'faculty','action' => 'view', $values['Faculty_ID']])?> </td>
                   <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'viewpublications', $values['Faculty_ID']])?> </td>
                  
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
     
     
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
