<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $themesCentersJunction->Themes_Centers_Junction_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $themesCentersJunction->Themes_Centers_Junction_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Themes Centers Junction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themesCentersJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($themesCentersJunction) ?>
    <fieldset>
        <legend><?= __('Edit Themes Centers Junction') ?></legend>
        <?php
            echo $this->Form->input('Labs_Centers_ID');
            echo $this->Form->input('Themes_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
