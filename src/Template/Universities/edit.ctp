<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $university->University_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $university->University_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="universities form large-9 medium-8 columns content">
    <?= $this->Form->create($university) ?>
    <fieldset>
        <legend><?= __('Edit University') ?></legend>
        <?php
            echo $this->Form->input('University');
            echo $this->Form->input('Addrss_Line_1');
            echo $this->Form->input('Addrss_Line_2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
