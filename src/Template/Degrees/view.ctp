<div class="container">

<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
    <h3>Degree Detail</h3>
    <table class="table table-reflow">
        <tr>
            <th><?= __('Degree Level') ?></th>
            <td><?= h($degree->Degree_Level) ?></td>
        </tr>
        <tr>
            <th><?= __('Program Name') ?></th>
            <td><?= h($degree->Program_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Other') ?></th>
            <td><?= h($degree->Other) ?></td>
        </tr>
          <?php if (in_array("Degrees_ID", $colnames)): ?>
        <tr>
            <th><?= __('Degrees ID') ?></th>
            <td><?= $this->Number->format($degree->Degrees_ID) ?></td>
        </tr>
        <?php endif; ?>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($degree->Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($degree->Sources)); ?>
    </div>
</div>
