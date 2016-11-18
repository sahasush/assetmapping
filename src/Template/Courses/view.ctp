<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->Courses_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->Courses_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $course->Courses_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">

    <h3>Course ID:<?= h($course->Courses_ID) ?></h3>
  <table class="table table-reflow">
        <tr>
            <th><?= __('Course Title') ?></th>
            <td><?= h($course->Course_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Course Abbr') ?></th>
            <td><?= h($course->Course_Abbr) ?></td>
        </tr>
        <tr>
            <th><?= __('Course Number') ?></th>
            <td><?= h($course->Course_Number) ?></td>
        </tr>
        <tr>
            <th><?= __('Other') ?></th>
            <td><?= h($course->Other) ?></td>
        </tr>
        <tr>
            <th><?= __('Courses ID') ?></th>
            <td><?= $this->Number->format($course->Courses_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Units') ?></th>
            <td><?= $this->Number->format($course->Units) ?></td>
        </tr>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($course->University_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Departments ID') ?></th>
            <td><?= $this->Number->format($course->Departments_ID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Catalog Link') ?></h4>
        <?= $this->Text->autoParagraph(h($course->Catalog_Link)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($course->Sources)); ?>
    </div>
</div>
