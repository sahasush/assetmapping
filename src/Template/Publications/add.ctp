<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Publications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="publications form large-9 medium-8 columns content">
    <?= $this->Form->create($publication) ?>
    <fieldset>
        <legend><?= __('Add Publication') ?></legend>
        <?php
            echo $this->Form->input('Publication_Name');
            echo $this->Form->input('Faculty_LName');
            echo $this->Form->input('Faculty_FName');
            echo $this->Form->input('Faculty_MInitial');
            echo $this->Form->input('CSU');
            echo $this->Form->input('Author_1_LName');
            echo $this->Form->input('Author_1_FName');
            echo $this->Form->input('Author_1_MInitial');
            echo $this->Form->input('Author_Name_2');
            echo $this->Form->input('Author_Name_3');
            echo $this->Form->input('Journal');
            echo $this->Form->input('Published_Yr');
            echo $this->Form->input('Database_Accessed');
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
