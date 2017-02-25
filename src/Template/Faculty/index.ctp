
<div class="container-fluid">
 <?php if (!empty($faculties)): ?>
	
	<br>
	<div class="form-group row">
    
	<?= $this->Form->create(null,['class' =>'form-inline']); ?>
	

	
	
<label for="name" class="col-xs-2 col-form-label">Please enter Faculty
			name to filter</label>
		<div class="col-xs-10">
	<?=  $this->Form->input('name', array('label' => false,'type' => 'text','class' => 'form-control','id' => 'name'));?>
</div>
	</div>
	<div class="form-group">
	
	  <?= $this->Form->button('Search', ['type' => 'submit'])?>     
             
   <?= $this->Form->button('Reset', ['type' => 'reset']); ?>


<?= $this->Form->end()?>
	</div>

</div>


</div>


<h3><?= __('Faculty') ?></h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('Faculty_ID') ?></th>
			<th><?= $this->Paginator->sort('Faculty_Fname') ?></th>
			<th><?= $this->Paginator->sort('Faculty_Lname') ?></th>
			<th><?= $this->Paginator->sort('Faculty_MInitial') ?></th>
			<th><?= $this->Paginator->sort('Email') ?></th>
			<th><?= $this->Paginator->sort('CSU') ?></th>
			<th><?= $this->Paginator->sort('Position') ?></th>
			<th><?= $this->Paginator->sort('Dept_Affiliation') ?></th>
			<th><?= $this->Paginator->sort('Address_Line_1') ?></th>
			<th><?= $this->Paginator->sort('Building_Room') ?></th>
			<th><?= $this->Paginator->sort('Address_Line_2') ?></th>
			<th><?= $this->Paginator->sort('Phone_1') ?></th>
			<th><?= $this->Paginator->sort('Phone_1_Ext') ?></th>
			<th><?= $this->Paginator->sort('Phone_2') ?></th>
			<th><?= $this->Paginator->sort('Phone_2_Desc') ?></th>
			<th><?= $this->Paginator->sort('Degree') ?></th>
			<th><?= $this->Paginator->sort('Degree_Discip') ?></th>
			<th><?= $this->Paginator->sort('Validation') ?></th>
			<th><?= $this->Paginator->sort('Validation_Source') ?></th>
			<th><?= $this->Paginator->sort('Valid_Exist') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
            <?php foreach ($faculties as $faculty): ?>
            <tr>
			<td><?= $this->Number->format($faculty->Faculty_ID) ?></td>
			<td><?= h($faculty->Faculty_Fname) ?></td>
			<td><?= h($faculty->Faculty_Lname) ?></td>
			<td><?= h($faculty->Faculty_MInitial) ?></td>
			<td><?= h($faculty->Email) ?></td>
			<td><?= h($faculty->CSU) ?></td>
			<td><?= h($faculty->Position) ?></td>
			<td><?= h($faculty->Dept_Affiliation) ?></td>
			<td><?= h($faculty->Address_Line_1) ?></td>
			<td><?= h($faculty->Building_Room) ?></td>
			<td><?= h($faculty->Address_Line_2) ?></td>
			<td><?= h($faculty->Phone_1) ?></td>
			<td><?= h($faculty->Phone_1_Ext) ?></td>
			<td><?= h($faculty->Phone_2) ?></td>
			<td><?= h($faculty->Phone_2_Desc) ?></td>
			<td><?= h($faculty->Degree) ?></td>
			<td><?= h($faculty->Degree_Discip) ?></td>
			<td><?= h($faculty->Validation) ?></td>
			<td><?= h($faculty->Validation_Source) ?></td>
			<td><?= h($faculty->Valid_Exist) ?></td>
			<td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $faculty->Faculty_ID])?>
                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $faculty->Faculty_ID])?> -->
                   <!--  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $faculty->Faculty_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $faculty->Faculty_ID)])?>  -->
                </td>
		</tr>
            <?php endforeach; ?>
        </tbody>
</table>
<div class="paginator">
	<ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous'))?>
            <?= $this->Paginator->numbers()?>
            <?= $this->Paginator->next(__('next') . ' >')?>
        </ul>
	<p><?= $this->Paginator->counter() ?></p>
</div>
 <?php endif; ?>
 <?php if (empty($faculties)): ?>
        <div class="alert alert-danger">
  			<strong>Warning!<strong> <?= $this->Flash->render() ?>
		</div>
         
         <?php endif; ?>
</div>



