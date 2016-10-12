
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


<table cellpadding="0" cellspacing="0">
   <tbody>
      <tr>
         <td>
            <?=$this->Form->input('Themes', array('type' => 'select','options'=> $themes)); ?>    
            </td>
            <td>  
            <label for="datacomponents">Data Components</label>           
            <select name="Datacomponent" id="Datacomponent">
               <option value="degree">Degrees</option>
               <option value="courses">Courses</option>
               <option value="centers">Labs/Centers</option>
               <option value="faculty">Faculty</option>
            </select>
            </td>
      </tr>
   </tbody>
</table>
   <?= $this->Form->button('Search', ['type' => 'submit']) ?>
   <?= $this->Form->button('Reset', ['type' => 'reset']); ?>
  
   <?= $this->Form->end()?>
  
</div>