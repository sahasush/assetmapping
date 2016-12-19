<div class="container">
	  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
    <h3>Course Detail</h3>
    
  <table class="table table-reflow">
  <?php if (in_array("Courses_ID", $colnames)): ?>
        <tr>
            <th><?= __('Courses ID') ?></th>
            <td><?= $this->Number->format($course->Courses_ID) ?></td>
        </tr>
         <?php endif; ?>
        <tr>
            <th><?= __('Course Title') ?></th>
            <td><?= h($course->Course_Title) ?></td>
        </tr>
         <tr>
            <th><?= __('Course Number') ?></th>
            <td><?= h($course->Course_Abbr) ?> <?= h($course->Course_Number) ?></td>
        </tr>
        <tr>
            <th><?= __('Other') ?></th>
            <td><?= h($course->Other) ?></td>
        </tr>
          
        <tr>
            <th><?= __('Units') ?></th>
            <td><?= $this->Number->format($course->Units) ?></td>
        </tr>
        <?php if (in_array("University_ID", $colnames)): ?>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($course->University_ID) ?></td>
        </tr>
        <?php endif; ?>
       <tr>
            <th><?= __('Department') ?></th>
             <td><?= h($course->department->Department) ?></td>
        </tr>
       
        <?php if (in_array("Departments_ID", $colnames)): ?>
        <tr>
            <th><?= __('Departments ID') ?></th>
            <td><?= $this->Number->format($course->Departments_ID) ?></td>
        </tr>
        <?php endif; ?>
    </table>
    <div class="row">
        <h4><?= __('Catalog Link') ?></h4>
        <?= $this->Text->autoParagraph(h($course->Catalog_Link)); ?>
    </div>
     <?php if (in_array("Sources", $colnames)): ?>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($course->Sources)); ?>
    </div>
     <?php endif; ?>
</div>
