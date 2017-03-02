
<div class="container">
  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

    <h3><?= h('Publications Detail') ?></h3>
       <table class="table table-reflow">
        <tr>
            <th><?= __('Publication Name') ?></th>
            <td><?= h($publication->Publication_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty LName') ?></th>
            <td><?= h($publication->Faculty_LName) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty FName') ?></th>
            <td><?= h($publication->Faculty_FName) ?></td>
        </tr>
        <tr>
            <th><?= __('Faculty MInitial') ?></th>
            <td><?= h($publication->Faculty_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('CSU') ?></th>
            <td><?= h($publication->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 LName') ?></th>
            <td><?= h($publication->Author_1_LName) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 FName') ?></th>
            <td><?= h($publication->Author_1_FName) ?></td>
        </tr>
        <tr>
            <th><?= __('Author 1 MInitial') ?></th>
            <td><?= h($publication->Author_1_MInitial) ?></td>
        </tr>
        <tr>
            <th><?= __('Author Name 2') ?></th>
            <td><?= h($publication->Author_Name_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Author Name 3') ?></th>
            <td><?= h($publication->Author_Name_3) ?></td>
        </tr>
        <tr>
            <th><?= __('Journal') ?></th>
            <td><?= h($publication->Journal) ?></td>
        </tr>
        <tr>
            <th><?= __('Published Yr') ?></th>
            <td><?= h($publication->Published_Yr) ?></td>
        </tr>
        <tr>
            <th><?= __('Sources') ?></th>
            <td><?= h($publication->Sources) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($publication->Validation) ?></td>
        </tr>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($publication->Validation_Source) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Exist') ?></th>
            <td><?= h($publication->Valid_Exist) ?></td>
        </tr>
        <tr>
            <th><?= __('Publications ID') ?></th>
            <td><?= $this->Number->format($publication->Publications_ID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Database Accessed') ?></h4>
        <?= $this->Text->autoParagraph(h($publication->Database_Accessed)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other') ?></h4>
        <?= $this->Text->autoParagraph(h($publication->Other)); ?>
    </div>
</div>
