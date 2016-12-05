<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $grant->Grants_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grant->Grants_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grants'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="grants form large-9 medium-8 columns content">
    <?= $this->Form->create($grant) ?>
    <fieldset>
        <legend><?= __('Edit Grant') ?></legend>
        <?php
            echo $this->Form->input('Center_Name');
            echo $this->Form->input('CSU');
            echo $this->Form->input('Grant_Project_Title');
            echo $this->Form->input('Research_Obj');
            echo $this->Form->input('Grantor');
            echo $this->Form->input('Grant_Amount');
            echo $this->Form->input('Effective_Yr');
            echo $this->Form->input('Effective_Mo');
            echo $this->Form->input('Expiration_Yr');
            echo $this->Form->input('Expiration_Mo');
            echo $this->Form->input('PI_Fname');
            echo $this->Form->input('PI_Lname');
            echo $this->Form->input('PI_MInitial');
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
