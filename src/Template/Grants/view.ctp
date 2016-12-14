
<div class="container">

    <h3><?= h('Grants Detail') ?></h3>
    <table class="table table-reflow">
    
    <?php if (in_array("Grants_ID", $colnames)): ?>
     <tr>
            <th><?= __('Grants ID') ?></th>
            <td><?= $this->Number->format($grant->Grants_ID) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?= __('Center Name') ?></th>
            <td><?= h($grant->Center_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Campus') ?></th>
            <td><?= h($grant->CSU) ?></td>
        </tr>
        <tr>
            <th><?= __('Project Title') ?></th>
            <td><?= h($grant->Grant_Project_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Grantor') ?></th>
            <td><?= h($grant->Grantor) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Grant Warded') ?></th>
            <td><?= h($grant->Effective_Mo) ?>,  <?= h($grant->Effective_Yr) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Date Grant Expires') ?></th>
            <td><?= h($grant->Expiration_Mo) ?>,   <?= h($grant->Expiration_Yr) ?></td>
        </tr>
          <tr>
            <th><?= __('Principal Investigator') ?></th>
            <td>
            <?php if (!empty($grant->PI_Fname)): ?>
            <?= h($grant->PI_Fname) ?>,<?= h($grant->PI_Lname) ?>,<?= h($grant->PI_MInitial) ?>
            <?php endif; ?>		
            </td>
        </tr>
       <?php if (in_array("Validation", $colnames)): ?>
        <tr>
            <th><?= __('Validation') ?></th>
            <td><?= h($grant->Validation) ?></td>
        </tr>
        <?php endif; ?>
          <?php if (in_array("Validation", $colnames)): ?>
        <tr>
            <th><?= __('Validation_Source') ?></th>
            <td><?= h($grant->Validation_Source) ?></td>
        </tr>
        <?php endif; ?>
         <?php if (in_array("Valid_Exist", $colnames)): ?>
        <tr>
            <th><?= __('Presence Validated') ?></th>
            <td><?= h($grant->Valid_Exist) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?= __('Amount Granted') ?></th>
            <td><?= $this->Number->format($grant->Grant_Amount) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Research Objectives') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Research_Obj)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Other)); ?>
    </div>
    <?php if (in_array("Sources", $colnames)): ?>
    <div class="row">
        <h4><?= __('Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($grant->Sources)); ?>
    </div>
    <?php endif; ?>
</div>
