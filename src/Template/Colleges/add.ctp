<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Colleges'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colleges form large-9 medium-8 columns content">
    <?= $this->Form->create($college) ?>
    <fieldset>
        <legend><?= __('Add College') ?></legend>
        <?php
            echo $this->Form->input('College');
            echo $this->Form->input('University_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
