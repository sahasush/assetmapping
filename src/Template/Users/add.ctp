
<div class="container">
<nav class="posright">
    <ul >
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
             echo $this->Form->input('email');
            echo $this->Form->input('fullname');
            
        ?>
        <div class="input select">
            <label for="role">Role</label> 
            <select  class="selectpicker"  name="role" id="role">    
             <?php foreach ($roles as $role): ?>      
            
               <option value="<?php echo h($role->role_id );?>"><?= h($role->name )?></option>
               
           
         <?php endforeach; ?>
             </select>   
               
                
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
