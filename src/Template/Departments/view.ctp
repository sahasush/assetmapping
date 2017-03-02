<div class="container">
	  <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
    <h3><?=_('Department Details') ?></h3>
<table class="table table-reflow">
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($department->Department) ?></td>
        </tr>
        <tr>
            <th><?= __('Departments ID') ?></th>
            <td><?= $this->Number->format($department->Departments_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('Colleges ID') ?></th>
            <td><?= $this->Number->format($department->Colleges_ID) ?></td>
        </tr>
    </table>
</div>
