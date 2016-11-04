 
  
<nav class="posleft">
    <ul >
         <li class="list-inline"><?= __('Select One') ?></li>
         <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Search Theme'), ['action' => 'search']) ?> </li>
    </ul>
    
</nav>
<div class="container">
    <h3><?= __('Search Results') ?></h3>
     <br>Showing Resutls for Theme <b><?= h($theme->Theme) ?> </b>and component  <b><?=$component  ?> </b>

    <?php if (!empty($theme->degrees)): ?>
    
    
  
   <table class = "table table-bordered">    
   
     <thead>
        <tr>
            <th><?= __('Program Name') ?></th>    
             <th><?= __('Degree Level') ?></th>         
              
              <th><?= __('Other') ?></th>    
                
        </tr>
        </thead>
        <tbody>

                <?php foreach ($theme->degrees as $degree): ?>
                 <tr>
                    <td><?= h($degree->Program_Name) ?></td>                   
                   <td><?= h($degree->Degree_Level) ?></td>
                                     
                   <td><?= h($degree->Other) ?></td>
                   
                   </tr>
                <?php endforeach; ?>
            </td>
            </tbody>
    </table>
     <?php endif; ?>
    
    <?php if (!empty($theme->courses)): ?>
    <table class = "table table-bordered">
        
     <thead>
        <tr>
            <th><?= __('Course Title') ?></th>    
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
    <table class = "table table-bordered">        
        
     <thead>
        <tr>
            <th><?= __('Center Type') ?></th>    
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
