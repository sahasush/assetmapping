<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Centers Faculty Junction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="centersFacultyJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($centersFacultyJunction) ?>
    <fieldset>
        <legend><?= __('Add Centers Faculty Junction') ?></legend>
        <?php
            echo $this->Form->input('Labs_Centers_ID');
            echo $this->Form->input('Faculty_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
