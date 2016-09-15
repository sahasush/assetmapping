<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Themes Degrees Junction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themesDegreesJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($themesDegreesJunction) ?>
    <fieldset>
        <legend><?= __('Add Themes Degrees Junction') ?></legend>
        <?php
            echo $this->Form->input('Themes_ID');
            echo $this->Form->input('Degrees_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
