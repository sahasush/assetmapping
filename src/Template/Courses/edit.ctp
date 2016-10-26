<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $course->Courses_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $course->Courses_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('Edit Course') ?></legend>
        <?php
            echo $this->Form->input('Course_Title');
            echo $this->Form->input('Course_Abbr');
            echo $this->Form->input('Course_Number');
            echo $this->Form->input('Units');
            echo $this->Form->input('Catalog_Link');
            echo $this->Form->input('Other');
            echo $this->Form->input('Sources');
            echo $this->Form->input('University_ID');
            echo $this->Form->input('Departments_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
