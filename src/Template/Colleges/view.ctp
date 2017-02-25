
<div class="container">
   <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

    <h3>College Details</h3>
     <table class="table table-reflow">
        <tr>
            <th><?= __('College') ?></th>
            <td><?= h($college->College) ?></td>
        </tr>
        <tr>
            <th><?= __('Colleges ID') ?></th>
            <td><?= $this->Number->format($college->Colleges_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('University ID') ?></th>
            <td><?= $this->Number->format($college->University_ID) ?></td>
        </tr>
    </table>
</div>
