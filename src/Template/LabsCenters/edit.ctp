<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $labsCenter->Labs_Centers_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $labsCenter->Labs_Centers_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Labs Centers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="labsCenters form large-9 medium-8 columns content">
    <?= $this->Form->create($labsCenter) ?>
    <fieldset>
        <legend><?= __('Edit Labs Center') ?></legend>
        <?php
            echo $this->Form->input('Center_Type');
            echo $this->Form->input('Center_Name');
            echo $this->Form->input('Research_Area');
            echo $this->Form->input('Estbl_Yr');
            echo $this->Form->input('Active_Status');
            echo $this->Form->input('Contact_1_Lname');
            echo $this->Form->input('Contact_1_Fname');
            echo $this->Form->input('Contact_1_Minitial');
            echo $this->Form->input('Contact_2_Lname');
            echo $this->Form->input('Contact_2_Fname');
            echo $this->Form->input('Contact_2_Minitial');
            echo $this->Form->input('No_of_Researchers');
            echo $this->Form->input('No_of_Technicians');
            echo $this->Form->input('Lab_Accreditation');
            echo $this->Form->input('Time_of_Operation');
            echo $this->Form->input('Email');
            echo $this->Form->input('Address_1');
            echo $this->Form->input('Building_Room');
            echo $this->Form->input('Address_2');
            echo $this->Form->input('Phone_1');
            echo $this->Form->input('Phone_1_Ext');
            echo $this->Form->input('Phone_2');
            echo $this->Form->input('Phone_2_Desc');
            echo $this->Form->input('Web_URL');
            echo $this->Form->input('Other');
            echo $this->Form->input('Sources');
            echo $this->Form->input('Validation');
            echo $this->Form->input('Validation_Source');
            echo $this->Form->input('Valid_Exist');
            echo $this->Form->input('University_ID');
            echo $this->Form->input('Colleges_ID');
            echo $this->Form->input('Departments_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
