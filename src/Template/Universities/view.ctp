<nav class="posleft">
    <ul >
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit University'), ['action' => 'edit', $university->University_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete University'), ['action' => 'delete', $university->University_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $university->University_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container">
    <h3>University ID: <?= h($university->University_ID) ?></h3>
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
        <?php if (!empty($university->labscenters)): ?>
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
    
                <?php foreach ($university->labscenters as $lab): ?>
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
