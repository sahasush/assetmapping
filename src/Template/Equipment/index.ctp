
<div class="container-fluid">

<br>
    <br>
    <h3><?= __('Equipment') ?></h3>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Equipment_ID') ?></th>
                <th><?= $this->Paginator->sort('Center_Name') ?></th>
                <th><?= $this->Paginator->sort('CSU') ?></th>
                <th><?= $this->Paginator->sort('Brand') ?></th>
                <th><?= $this->Paginator->sort('Model') ?></th>
                <th><?= $this->Paginator->sort('Type') ?></th>
                <th><?= $this->Paginator->sort('Serial_Number') ?></th>
                <th><?= $this->Paginator->sort('Condition') ?></th>
                <th><?= $this->Paginator->sort('Public_Access') ?></th>
                <th><?= $this->Paginator->sort('Ownrshp_Status') ?></th>
                <th><?= $this->Paginator->sort('Validation') ?></th>
                <th><?= $this->Paginator->sort('Validation_Source') ?></th>
                <th><?= $this->Paginator->sort('Valid_Exist') ?></th>
                <th><?= $this->Paginator->sort('Lab_Centers_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipment as $equipment): ?>
            <tr>
                <td><?= $this->Number->format($equipment->Equipment_ID) ?></td>
                <td><?= h($equipment->Center_Name) ?></td>
                <td><?= h($equipment->CSU) ?></td>
                <td><?= h($equipment->Brand) ?></td>
                <td><?= h($equipment->Model) ?></td>
                <td><?= h($equipment->Type) ?></td>
                <td><?= h($equipment->Serial_Number) ?></td>
                <td><?= h($equipment->Condition) ?></td>
                <td><?= h($equipment->Public_Access) ?></td>
                <td><?= h($equipment->Ownrshp_Status) ?></td>
                <td><?= h($equipment->Validation) ?></td>
                <td><?= h($equipment->Validation_Source) ?></td>
                <td><?= h($equipment->Valid_Exist) ?></td>
                <td><?= $this->Number->format($equipment->Lab_Centers_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipment->Equipment_ID]) ?>
                   
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
