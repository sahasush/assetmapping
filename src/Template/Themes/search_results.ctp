
<div class="container">
  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
<br>

    <h4><?= __('Search Results') ?> : <b><?=ucfirst($component) ?>s</b> by <?= h($theme->Theme) ?> Theme</h3>
    
     <!--  Theme dept degree data -->
     <?php if ($component=='degree'): ?>
    
  <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
 
     <thead>
        <tr>
           
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>                
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>                
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>        
              <?php if (in_array("Degrees_ID", $colnames)): ?> 
                <th data-field="degree_id"  data-sortable="true"><?= __('Degrees ID') ?></th> 
                  <?php endif; ?>            
                 <th data-field="program_name"  data-sortable="true"><?= __('Program Name') ?></th>   
                 
                <th data-field="degree_level"  data-sortable="true"><?= __('Degree Level') ?></th> 
                 <?php if (in_array("Sources", $colnames)): ?>   
                 <th data-field="source" ><?= __('Sources') ?></th> 
                   <?php endif; ?>                       
                  <th  ><?= __('Additional Details') ?></th>   
                 
             
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($degrees as $key=>$values): ?>
                 <tr>
                  
                 <td><?= h($values['University']) ?> </td>  
                 <td><?= h($values['College']) ?></td>                   
                 <td><?= h($values['Department']) ?></td>      
                  <?php if (in_array("Degrees_ID", $colnames)): ?> 
                		<td><?= h($values['Degrees_ID']) ?></td>      
                  <?php endif; ?>                 
                  <td><?= h($values['Program_Name']) ?></td>            
                  <td><?= h($values['Degree_Level']) ?></td>
                     <?php if (in_array("Sources", $colnames)): ?>                 
                     <td><?=h($values['Sources'])?></td>  
                       <?php endif; ?>
                   <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'degrees','action' => 'view', $values['Degrees_ID']])?> </td>
                  
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
    
    <?php if ($component=='course'): ?>
    <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
            <th data-field="theme"  data-sortable="true"><?= __('Theme') ?></th>    
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>  
              <?php if (in_array("Courses_ID", $colnames)): ?> 
                <th data-field="course_id"  data-sortable="true"><?= __('Course ID') ?></th> 
                  <?php endif; ?>   
                <th data-field="course_title"  data-sortable="true"><?= __('Course Title') ?></th>   
                <th data-field="course_abbr"  data-sortable="true"><?= __('Course Abbr') ?></th>   
              <th data-field="course_number"  data-sortable="true"><?= __('Course Number') ?></th>   
              <th data-field="action"  ><?= __('View Additional Details') ?></th>   
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($courses as $key=>$values): ?>
                 <tr>
                 <td><?= h($values['theme'] )?></td>
                 <td><?= h($values['University']) ?></td>    
                 <td><?= h($values['College']) ?></td>  
                 <td><?= h($values['Department']) ?></td>  
                 <?php if (in_array("Courses_ID", $colnames)): ?>                 
                     <td><?=h($values['Courses_ID'])?></td>  
                       <?php endif; ?>
                  <td><?= h($values['Course_Title']) ?></td>
                  <td><?= h($values['Course_Abbr']) ?></td>
                 <td><?= h($values['Course_Number']) ?></td>               
                  <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'courses','action' => 'view', $values['Courses_ID']])?> </td>
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
     <!-- Display Labs Centers -->
     <?php if ($component=='center'): ?>
    <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
            <th data-field="theme"  data-sortable="true"><?= __('Theme') ?></th>    
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="department"  data-sortable="true"><?= __('Department') ?></th>    
              <?php if (in_array("Labs_Centers_ID", $colnames)): ?>                 
                     <th><?= __('Labs Centers ID') ?></th>  
                       <?php endif; ?>
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
                 <?php if (in_array("Labs_Centers_ID", $colnames)): ?>                 
                     <td><?=h($values['labs_centers_id'])?></td>  
                       <?php endif; ?>
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
              <?php if (in_array("Faculty_ID", $colnames)): ?>                 
                     <th><?= __('Faculty ID') ?></th>  
                       <?php endif; ?>
                <th data-field="faculty_name"  data-sortable="true"><?= __('Faculty Name') ?></th>   
                 
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
                 <?php if (in_array("Faculty_ID", $colnames)): ?>                 
                     <td><?=h($values['Faculty_ID'])?></td>  
                       <?php endif; ?>
                 <td><?= h($this->String->  lnameFirst($values['Faculty_Fname']   ,$values['Faculty_MInitial'],$values['Faculty_Lname']) )?></td>                 
                
                  <td><?= h($values['Center_Name']) ?></td>
                  <td class="actions"> <?= $this->Html->link(__('View Faculty'), ['controller'=>'faculty','action' => 'view', $values['Faculty_ID']])?> </td>
                   <td class="actions"> <?= $this->Html->link(__('View'), ['controller'=>'faculty','action' => 'viewpublications', $values['Faculty_ID']])?> </td>
                  
                   </tr>
                <?php endforeach; ?>
            
            </tbody>
    </table>
     <?php endif; ?>
     
     
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
