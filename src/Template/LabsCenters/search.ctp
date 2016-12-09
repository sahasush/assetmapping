
<div class="posright">
    <ul>
        <li ><?= __('Actions') ?></li>
              <li><?= $this->Html->link(__('List Labs Centers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Labs Center'), ['action' => 'add']) ?> </li>
    </ul>
</div>

<div class="container">

		<h3><?= __('Lab/Center Search') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'LabsCenters', 'action' => 'searchResults' ], 'class' =>'form-horizontal','type' => 'get']); ?>


         <div class="form-group">              
                
        <?php
								
								$url = $this->Url->build ( [ 
										'controller' => 'labscenters',
										'action' => 'univCentersAjax',
										'_ext' => 'json' 
								] );
								
								
								$empty = $centers->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'pleaseSelect' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'noOptionAvailable' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
															
								
								?>
								
								
		 <label class="control-label col-sm-2" for="university">University</label>
			<div class="col-sm-10">	
			<?=  $this->Form->input('university_id', array('label' => false,'type' => 'select','options'=> $universities,'class' => 'selectpicker','data-live-search'=>'true','id' => 'universities', 'rel' => $url));?>
			
			
			</div>
		</div>
     <div class="form-group">    
            <label class="control-label col-sm-2" for="centers">Centers</label>
            <div class="col-sm-10">	          
				<?= $this->Form->input('labs_center_id', ['label' => false,'id' => 'centers', 'empty' => $empty]); ?>  
			</div>
     </div>
       

		 <div class="form-group">    
            <label class="control-label col-sm-2" for="component">Data Component</label>
            <div class="col-sm-10">	 

			<div class="input select">
				 <select
					class="selectpicker" data-live-search="true" name="Datacomponent"
					id="Datacomponent">					
					<option value="equipment">Equipment</option>
					<option value="faculty">Faculty</option>		
					<option value="grants">Grants</option>				
					<option value="centers">Labs/Centers</option>
					
				</select>

			</div>
		</div>
 </div>
        <?= $this->Form->button('Search', ['type' => 'submit'])?>
      
             
   <?= $this->Form->button('Reset', ['type' => 'reset']); ?>
   
  </td>
   <?= $this->Form->end()?>
   
  
   
   </tr>
		</tbody>
		</table>
	</form>
</div>



<script>
$(function() {
	$('#universities').change(function() {
	
		var selectedValue = $(this).val();
		var targeturl = $(this).attr('rel') + '?university_id=' + selectedValue;
	
		$.ajax({
			type: 'post',
			url: targeturl,
			beforeSend: function(xhr) {
				
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			},
			success: function(response) {
				
				if (response.content) {
					$('#centers').html(response.content);				
					
				}
			},
			error: function(e) {
				
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
			}
		});
	});
});


</script>

