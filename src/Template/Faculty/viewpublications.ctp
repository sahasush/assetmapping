
<div class="container">
	
		<?php if ($role == $Admin): ?>
<nav class="posright">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
	
		<li><?= $this->Html->link(__('Edit Faculty'), ['action' => 'edit', $faculty->Faculty_ID]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Faculty'), ['action' => 'delete', $faculty->Faculty_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $faculty->Faculty_ID)]) ?> </li>
		<li><?= $this->Html->link(__('List Faculty'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Faculty'), ['action' => 'add']) ?> </li>
	</ul>

</nav>
	 <?php endif; ?>

	<h3>Faculty and PublicationDetails</h3>
	<table class="table table-reflow">
      <?php if (in_array("Faculty_ID", $colnames)): ?>
      <tr>
			<th><?= __('Faculty ID') ?></th>
			<td><?= h($faculty->Faculty_ID) ?></td>
		</tr>
        <?php endif; ?>
        <tr>
			<th><?= __('Faculty Name') ?></th>
			<td><?= h($faculty->Faculty_Lname) ?>,<?= h($faculty->Faculty_Fname) ?>,<?= h($faculty->Faculty_MInitial) ?></td>
		</tr>
		</table>
		<table class="table table-bordered">
		<thead>
            <tr>
                <th><?= __('Publication Title') ?></th>
                  <th><?= __('Journal') ?></th>
                   <th><?= __('Campus') ?></th>
                    <th><?= __('Year Published') ?></th>
                 </tr>
        </thead>
        <tbody>
		
	<?php if (!empty($faculty->publications)): ?>		
          
                <?php foreach ($faculty->publications as $publication): ?>
                 <tr>	
                   <td> <?= h($publication->Publication_Name) ?></td>
                    <td> <?= h($publication->Journal) ?></td>
                     <td> <?= h($publication->CSU) ?></td>
                     <td> <?= h($publication->Published_Yr) ?></td>
                    </tr>
                <?php endforeach; ?>            
        <?php else: ?>
            <p>-</p>
        <?php endif; ?>
       
           
	</table>
</div>
