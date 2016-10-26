<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Themes Courses Junction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themesCoursesJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($themesCoursesJunction) ?>
    <fieldset>
        <legend><?= __('Add Themes Courses Junction') ?></legend>
        <?php
            echo $this->Form->input('Themes_ID');
            echo $this->Form->input('Courses_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
