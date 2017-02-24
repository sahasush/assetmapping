<div class="container"> 
  
<h3><?= __('Search by Theme') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'Themes', 'action' => 'searchResults'],'class' =>'form-horizontal','type' => 'get','id' => 'form1']); ?>




<div class="form-group">        
         <label class="control-label col-sm-2" for="theme">Theme</label>
			<div class="col-sm-1">				
			<?=$this->Form->input('Themes', array('type' => 'select','options'=> $themes,'class' => 'selectpicker','data-live-search'=>'true','label'=>false)); ?>   
			</div>
		</div>
		
		<div class="form-group">        
         <label class="control-label col-sm-2" for="data">Data Component</label>
			<div class="col-sm-1">				
			 <div class="input select">
           
            <select  class="selectpicker" data-live-search="true" name="Datacomponent" id="Datacomponent">
               <option value="degree">Degrees</option>
               <option value="courses">Courses</option>
               <option value="centers">Labs/Centers</option>
               <option value="faculty">Faculty</option>
            </select>
           
            </div>
			</div>
		</div>


<!--  Commented for future panel layout--> 
<!--  <div class="panel panel-default">
  <div class="panel-heading">Theme</div>
  <div class="panel-body">
    <?=$this->Form->input('Themes', array('type' => 'select','options'=> $themes,'class' => 'selectpicker','data-live-search'=>'true','label' => false )); ?>    
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Data Component</h3>
  </div>
  <div class="panel-body">
     <div class="input select">
             <select  class="selectpicker" data-live-search="true" name="Datacomponent" id="Datacomponent">
               <option value="degree">Degrees</option>
               <option value="courses">Courses</option>
               <option value="centers">Labs/Centers</option>
               <option value="faculty">Faculty</option>
            </select>
           
            </div>
  </div>
</div>  -->
   <?= $this->Form->button('Search', ['type' => 'submit']) ?>
      <?= $this->Form->button('Reset', ['type' => 'reset']); ?>
<!--  Trying panel layout End--> 
     <?= $this->Form->end()?>
</div>




 <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>


<script>
$('#form1').on('reset', function() {
	  	  
	  setTimeout(function() {
		  $('.selectpicker').selectpicker('refresh');
		  
	  });
	});

</script>