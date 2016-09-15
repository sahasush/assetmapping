<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="degrees form large-9 medium-8 columns content">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Add Degree') ?></legend>
        <?php
            echo $this->Form->input('Description');
            echo $this->Form->input('Degree_Level');
            echo $this->Form->input('Program_Name');
            echo $this->Form->input('Other');
            echo $this->Form->input('Sources');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
