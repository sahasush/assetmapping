<div class="container">
  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

   <table class="table table-reflow">
    
    <?php if (in_array("Equipment_ID", $colnames)): ?>
   <tr>
            <th><?= __('Equipment ID') ?></th>
            <td><?= $this->Number->format($equipment->Equipment_ID) ?></td>
        </tr>
       
          <?php endif; ?>
        <tr>
            <th><?= __('Center Name') ?></th>
            <td><?= h($equipment->Center_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Campus') ?></th>
            <td><?= h($equipment->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Brand') ?></th>
            <td><?= h($equipment->Brand) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($equipment->Model) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($equipment->Type) ?></td>
        </tr>
        <tr>
            <th><?= __('Serial Number') ?></th>
            <td><?= h($equipment->Serial_Number) ?></td>
        </tr>
        <?php if (in_array("Condition", $colnames)): ?>
        <tr>
            <th><?= __('Condition') ?></th>
            <td><?= h($equipment->Condition) ?></td>
        </tr>
        <?php endif; ?>
        <?php if (in_array("Public_Access", $colnames)): ?>
        <tr>
            <th><?= __('Public Access') ?></th>
            <td><?= h($equipment->Public_Access) ?></td>
        </tr>
        <?php endif; ?>
         <?php if (in_array("Ownrshp_Status", $colnames)): ?>
        <tr>
            <th><?= __('Ownership Status') ?></th>
            <td><?= h($equipment->Ownrshp_Status) ?></td>
        </tr>
          <?php endif; ?>
          <?php if (in_array("Validation", $colnames)): ?>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($equipment->Validation) ?></td>
        </tr>
         <?php endif; ?>
         <?php if (in_array("Validation_Source", $colnames)): ?>
        <tr>
            <th><?= __('Validation Source') ?></th>
            <td><?= h($equipment->Validation_Source) ?></td>
        </tr>
        <?php endif; ?>
        <?php if (in_array("Valid_Exist", $colnames)): ?>
        <tr>
            <th><?= __('Presence Validated') ?></th>
            <td><?= h($equipment->Valid_Exist) ?></td>
        </tr>
         <?php endif; ?>
         <?php if (in_array("Lab_Centers_ID", $colnames)): ?>
        <tr>
            <th><?= __('Lab Centers ID') ?></th>
            <td><?= $this->Number->format($equipment->Lab_Centers_ID) ?></td>
        </tr>
          <?php endif; ?>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->Other)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->Sources)); ?>
    </div>
</div>
