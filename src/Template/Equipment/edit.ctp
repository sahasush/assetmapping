<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $equipment->Equipment_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->Equipment_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Equipment'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="equipment form large-9 medium-8 columns content">
    <?= $this->Form->create($equipment) ?>
    <fieldset>
        <legend><?= __('Edit Equipment') ?></legend>
        <?php
            echo $this->Form->input('Center_Name');
            echo $this->Form->input('CSU');
            echo $this->Form->input('Brand');
            echo $this->Form->input('Model');
            echo $this->Form->input('Type');
            echo $this->Form->input('Serial_Number');
            echo $this->Form->input('Description');
            echo $this->Form->input('Condition');
            echo $this->Form->input('Public_Access');
            echo $this->Form->input('Ownrshp_Status');
            echo $this->Form->input('Other');
            echo $this->Form->input('Sources');
            echo $this->Form->input('Validation');
            echo $this->Form->input('Validation_Source');
            echo $this->Form->input('Valid_Exist');
            echo $this->Form->input('Lab_Centers_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
