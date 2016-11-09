
<div class="container-fluid"> 
  
<nav class="posright">
    <ul >
         <li class="list-inline"><?= __('Select One') ?></li>
         <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Search Theme'), ['action' => 'search']) ?> </li>
    </ul>
    
</nav>
    <h3><?= __('Search Results') ?></h3>
     <br>Showing Resutls for Theme <b><?= h($theme->Theme) ?> </b>and component  <b><?=$component  ?> </b>

    
     
     <!--  Theme dept degree data -->
     <?php if (!empty($deptdata)): ?>
    
    
  
  <table data-toggle="table"  data-sort-name="theme" data-sort-order="asc">
   
     <thead>
        <tr>
            <th data-field="theme"  data-sortable="true"><?= __('Theme') ?></th>    
            <th data-field="university"  data-sortable="true"><?= __('University') ?></th>    
            <th data-field="college"  data-sortable="true"><?= __('College') ?></th>    
             <th data-field="theme"  data-sortable="true"><?= __('Department') ?></th>    
                <th data-field="degree_level"  data-sortable="true"><?= __('Degree Level') ?></th>   
              <th data-field="program_name"  data-sortable="true"><?= __('Program Name') ?></th>   
              </tr> 
        </thead>
        <tbody>

                <?php foreach ($deptdata as $key=>$values): ?>
                 <tr>
                 <td><?= h($values['theme'] )?></td>
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
    
    <?php if (!empty($theme->courses)): ?>
    <table data-toggle="table"  data-sort-name="course_title" data-sort-order="asc">
        
     <thead>
        <tr>
            <th data-field="course_title" data-sortable="true"><?= __('Course Title') ?></th>    
             <th><?= __('Course Number') ?></th>    
              <th><?= __('Course Abbr') ?></th>    
              <th><?= __('Units') ?></th>      
           
                
        </tr>
        </thead>
        <tbody>

          
        
    
        
                <?php foreach ($theme->courses as $course): ?>
                 <tr>
                    <td><?= h($course->Course_Title) ?></td>                   
                   <td><?= h($course->Course_Number) ?></td>
                   <td><?= h($course->Course_Abbr) ?></td>
                    <td><?= h($course->Units) ?></td>
                   </tr>
                <?php endforeach; ?>
            
        
       
        </td>
            
            </tbody>
    </table>
     <?php endif; ?>
     <!-- Display Labs Centers -->
     <?php if (!empty($theme->labs_centers)): ?>
    <table  data-toggle="table"  data-sort-name="course_title" data-sort-order="asc">
        
     <thead>
        <tr>
            <th data-field="center_name" data-sortable="true"><?= __('Center Type') ?></th>    
             <th><?= __('Center Name') ?></th>    
              <th><?= __('Research Area') ?></th>    
              <th><?= __('Address') ?></th>    
              <th><?= __('Web_URL') ?></th>             
          </tr>
        </thead>
        <tbody>
                <?php foreach ($theme->labs_centers as $center): ?>
                 <tr>
                    <td><?= h($center->Center_Type) ?></td>                   
                   <td><?= h($center->Center_Name) ?></td>
                   <td><?= h($center->Research_Area) ?></td>
                    <td><?= h($center->Address_1.','. $center->Building_Room.', ' . $center->Address_2) ?></td>
                     <td><?= h($center->Web_URL) ?></td>
                   </tr>
                <?php endforeach; ?>
                </tbody>
    </table>
     <?php endif; ?>
     
    
     
     
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
