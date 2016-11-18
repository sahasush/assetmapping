<nav class="posleft">
    <ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="container">
    <?= $this->Form->create($university,['class'=>'form-horizontal']); ?>
    

    <fieldset>
		<legend><?= __('Add University') ?></legend>
		<div class="form-group">
			<label class="control-label col-sm-2" for="University">University:</label>
			<div class="col-sm-10">
      			<?=  $this->Form->input('University', array('label' => false,'type' => 'text','class' => 'form-control','id' => 'University'));?>
    		</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="Addrss_Line_1">Addrss Line 1</label>
			<div class="col-sm-10">
      			<?=  $this->Form->input('Addrss_Line_1', array('label' => false,'type' => 'text','class' => 'form-control','id' => 'Addrss_Line_1'));?>
    		</div>
		</div>
  	 <div class="form-group">
			<label class="control-label col-sm-2" for="Addrss_Line_2">Addrss Line 2</label>
			<div class="col-sm-10">
      			<?=  $this->Form->input('Addrss_Line_2', array('label' => false,'type' => 'text','class' => 'form-control','id' => 'Addrss_Line_2'));?>
    		</div>
		</div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit'))?>
    <?= $this->Form->end()?>
</div>
