
<div class="container-fluid">

<br>
<br>
    <h3><?= __('Courses') ?></h3>
   <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Courses_ID') ?></th>
                <th><?= $this->Paginator->sort('Course_Title') ?></th>
                <th><?= $this->Paginator->sort('Course_Abbr') ?></th>
                <th><?= $this->Paginator->sort('Course_Number') ?></th>
                <th><?= $this->Paginator->sort('Units') ?></th>
                <th><?= $this->Paginator->sort('Other') ?></th>
                <th><?= $this->Paginator->sort('University_ID') ?></th>
                <th><?= $this->Paginator->sort('Departments_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $this->Number->format($course->Courses_ID) ?></td>
                <td><?= h($course->Course_Title) ?></td>
                <td><?= h($course->Course_Abbr) ?></td>
                <td><?= h($course->Course_Number) ?></td>
                <td><?= $this->Number->format($course->Units) ?></td>
                <td><?= h($course->Other) ?></td>
                <td><?= $this->Number->format($course->University_ID) ?></td>
                <td><?= $this->Number->format($course->Departments_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->Courses_ID]) ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
