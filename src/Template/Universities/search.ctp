<div class="container">

		<h3><?= __('Universities') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'Universities', 'action' => 'searchResults' ], 'class' =>'form-horizontal','type' => 'get']); ?>


         <div class="form-group">              
                
        <?php
								
								$url = $this->Url->build ( [ 
										'controller' => 'universities',
										'action' => 'univCollegesAjax',
										'_ext' => 'json' 
								] );
								
								$collurl = $this->Url->build ( [ 
										'controller' => 'universities',
										'action' => 'collegeDeptAjax',
										'_ext' => 'json' 
								] );
								
								$empty = $colleges->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'pleaseSelect' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'noOptionAvailable' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								$deptempty = $departments->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'pleaseSelect' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'noOptionAvailable' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								
								
								
								?>
								
							
		 <label class="control-label col-sm-2" for="university">University</label>
			<div class="col-sm-10">	
			<?=  $this->Form->input('university_id', array('label' => false,'type' => 'select','options'=> $universities,'class' => 'selectpicker','data-live-search'=>'true','id' => 'universities', 'rel' => $url));?>
			
			
			</div>
		</div>
     <div class="form-group">    
            <label class="control-label col-sm-2" for="college">College</label>
            <div class="col-sm-10">	
          
				<?= $this->Form->input('college_id', ['label' => false,'id' => 'colleges', 'empty' => $empty,'collrel' => $collurl]); ?>  
			</div>
     </div>
       <div class="form-group">    
            <label class="control-label col-sm-2" for="department">Department</label>
            <div class="col-sm-10">	 
          <?= $this->Form->input('department_id', ['label' => false,'id' => 'departments', 'empty' => $deptempty]); ?>
		</div>
		</div>
		 <div class="form-group">    
            <label class="control-label col-sm-2" for="component">Data Component</label>
            <div class="col-sm-10">	 

			<div class="input select">
				 <select
					class="selectpicker" data-live-search="true" name="Datacomponent"
					id="Datacomponent">
					<option value="courses">Courses</option>
					<option value="degrees">Degrees</option>
					<option value="equipment">Equipment</option>
					<option value="faculty">Faculty</option>						
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
					$('#colleges').html(response.content);
				
					
				}
			},
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
			}
		});
	});
});

//Change colleges

$(function() {
	$('#colleges').change(function() {
	
		var selectedValue = $(this).val();
		var targeturl = $(this).attr('collrel') + '?college_id=' + selectedValue;
		
		$.ajax({
			type: 'post',
			url: targeturl,
			beforeSend: function(xhr) {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			},

			
			success: function(response) {
				if (response.content) {
					$('#departments').html(response.content);
				
					
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

