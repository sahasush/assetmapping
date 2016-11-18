<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Faculty'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="container">


    <?= $this->Form->create($faculty) ?>
    <fieldset>
        <legend><?= __('Add Faculty') ?></legend>
        <?php
            echo $this->Form->input('Faculty_Fname');
            echo $this->Form->input('Faculty_Lname');
            echo $this->Form->input('Faculty_MInitial');
            echo $this->Form->input('Email');
            echo $this->Form->input('CSU');
            echo $this->Form->input('Position');
            echo $this->Form->input('Dept_Affiliation');
            echo $this->Form->input('Address_Line_1');
            echo $this->Form->input('Building_Room');
            echo $this->Form->input('Address_Line_2');
            echo $this->Form->input('Phone_1');
            echo $this->Form->input('Phone_1_Ext');
            echo $this->Form->input('Phone_2');
            echo $this->Form->input('Phone_2_Desc');
            echo $this->Form->input('Expertise');
            echo $this->Form->input('Degree');
            echo $this->Form->input('Degree_Discip');
            echo $this->Form->input('Other');
            echo $this->Form->input('Sources');
            echo $this->Form->input('Validation');
            echo $this->Form->input('Validation_Source');
            echo $this->Form->input('Valid_Exist');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
