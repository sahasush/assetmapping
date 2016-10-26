<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $themesCoursesJunction->Themes_Courses_Junction_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $themesCoursesJunction->Themes_Courses_Junction_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Themes Courses Junction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themesCoursesJunction form large-9 medium-8 columns content">
    <?= $this->Form->create($themesCoursesJunction) ?>
    <fieldset>
        <legend><?= __('Edit Themes Courses Junction') ?></legend>
        <?php
            echo $this->Form->input('Themes_ID');
            echo $this->Form->input('Courses_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
