
<div class="posleft">
<ul>
        <li class="list-inline"><?= __('Select One') ?></li>
         <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Search Theme'), ['action' => 'search']) ?> </li>
    </ul>

</div>

<div class="container">

<h3><?= __('Themes') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'Themes', 'action' => 'searchResults']]); ?>


<table class='table borderless'>
   <tbody>
      <tr>
         <td>
          <!-- <div class="form-group"> -->
          
          
            <?=$this->Form->input('Themes', array('type' => 'select','options'=> $themes,'class' => 'selectpicker','data-live-search'=>'true')); ?>    
       
            </td>
            <td>  
            
              <div class="input select">
            <label for="datacomponents">Data Components</label>           
            <select  class="selectpicker" data-live-search="true" name="Datacomponent" id="Datacomponent">
               <option value="degree">Degrees</option>
               <option value="courses">Courses</option>
               <option value="centers">Labs/Centers</option>
               <option value="faculty">Faculty</option>
            </select>
           
            </div>
            </td>
      </tr>
      <tr>
      <td>
        <?= $this->Form->button('Search', ['type' => 'submit']) ?>
        </td>
        <td>
   <?= $this->Form->button('Reset', ['type' => 'reset']); ?>
  </td>
   <?= $this->Form->end()?>
   
   </tr>
   </tbody>
</table>
 
  
</div>