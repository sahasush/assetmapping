<nav class="large-3 medium-4 columns" id="actions-sidebar">
   <ul class="side-nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('New Faculty'), ['action' => 'add']) ?></li>
   </ul>
   <?= $this->Form->create(); ?>
   <b> please enter name to search </b>
   <?= $this->Form->input('name') ?>
   <?= $this->Form->button('Filter', ['type' => 'submit']) ?>
   <?= $this->Html->link('Reset', ['action' => 'index']) ?>
   <?= $this->Form->end()?>
</nav>
<?php  echo $this->Html->script('scripts');?>
<div class="themes index large-9 medium-8 columns content">
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