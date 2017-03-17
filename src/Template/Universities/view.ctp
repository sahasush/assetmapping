
<div class="container">
  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
    <h3>University Details</h3>
         <table class="table table-reflow">
        <tr>
            <th><?= __('University') ?></th>
            <td><?= h($university->University) ?></td>
        </tr>
        <tr>
            <th><?= __('Addrss Line 1') ?></th>
            <td><?= h($university->Addrss_Line_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Addrss Line 2') ?></th>
            <td><?= h($university->Addrss_Line_2) ?></td>
        </tr>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($university->University_ID) ?></td>
        </tr>
        
        <tr>
        <th><?= _('Labs Centers')?></th>
        <td>
        <?php if (!empty($university->labs_centers)): ?>
         <table class = "table table-bordered">
        <thead >
  		 <tr>
     
      <th>Center Name</th>
      <th>Email</th>
      <th>Address</th>
        <th>Web URL</th>
    </tr>
  </thead>
  <tbody>
    
                <?php foreach ($university->labs_centers as $lab): ?>
                <tr>
                 <td> <?= h($lab->Center_Name) ?>  </td>
               <td><?= h($lab->Email) ?></td>
                <td><?= h($lab->Address_1) ?>,<?= h($lab->Address_2) ?></td>
                <td><?= h($lab->Web_URL) ?></td>
                  </tr>
                <?php endforeach; ?>
       </tbody>
            </table>
            <?php else: ?>
            <p>None</p>
        <?php endif; ?>
        
        </td>
        </tr>
    </table>
</div>
