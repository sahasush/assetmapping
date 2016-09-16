<nav class="large-1 medium-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
         <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Search Theme'), ['action' => 'search']) ?> </li>
    </ul>
</nav>
<div class="themes index large-11 medium-10 columns content">
    <h3><?= __('Search Results') ?></h3>
     <br>Showing Resutls for Theme <b><?= h($theme->Theme) ?> </b>and component  <b><?=$component  ?> </b>

    <table cellpadding="0" cellspacing="0">
        
     <thead>
        <tr>
            <th><?= __('Program Name') ?></th>    
             <th><?= __('Degree Level') ?></th>         
              
              <th><?= __('Other') ?></th>    
                
        </tr>
        </thead>
        <tbody>

          
        
        <?php if (!empty($theme->degrees)): ?>
        
                <?php foreach ($theme->degrees as $degree): ?>
                 <tr>
                    <td><?= h($degree->Program_Name) ?></td>                   
                   <td><?= h($degree->Degree_Level) ?></td>
                                     
                   <td><?= h($degree->Other) ?></td>
                   
                   </tr>
                <?php endforeach; ?>
            
            <?php else: ?>
            <p>None</p>
        <?php endif; ?>
        </td>
            
            </tbody>
    </table>
    
    
    
         
</div>
