
<div class="container">

		<h3><?= __('Universities') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'Faculty', 'action' => 'searchResults' ], 'class' =>'form-horizontal','type' => 'get','id' => 'form1']); ?>


         <div class="form-group">              
                
        <?php
								
								$url = $this->Url->build ( [ 
										'controller' => 'faculty',
										'action' => 'univFlnameAjax',
										'_ext' => 'json' 
								] );
								
								$flnameurl = $this->Url->build ( [ 
										'controller' => 'faculty',
										'action' => 'fnameLnameAjax',
										'_ext' => 'json' 
								] );
								
								$empty = $faclnames->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'pleaseSelect' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'noOptionAvailable' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								$facfnamempty = $facfnames->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'pleaseSelect' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'noOptionAvailable' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								
								
								
								?>
								
					
		 <label class="control-label col-sm-2" for="university">University</label>
			<div class="col-sm-10">	
			<?=  $this->Form->input('university_id', array('label' => false,'type' => 'select','options'=> $universities,'class' => 'selectpicker','data-live-search'=>'true','id' => 'universities', 'rel' => $url));?>
			
			
			</div>
		</div>
     <div class="form-group">    
            <label class="control-label col-sm-2" for="faclname">Faculty Last Name</label>
            <div class="col-sm-10">	          
				<?= $this->Form->input('fname_id', ['label' => false,'id' => 'faclnames', 'empty' => $empty,'flanmerel' => $flnameurl ]); ?>  
				
			</div>
     </div>
       <div class="form-group">    
            <label class="control-label col-sm-2" for="department">Faculty First Name</label>
            <div class="col-sm-10">	 
          <?= $this->Form->input('lname_id', ['label' => false,'id' => 'facfnames', 'empty' => $facfnamempty ]); ?>
		</div>
		</div>
		 <div class="form-group">    
            <label class="control-label col-sm-2" for="component">Data Component</label>
            <div class="col-sm-10">	 

			<div class="input select">
				 <select
					class="selectpicker" data-live-search="true" name="Datacomponent"
					id="Datacomponent">
					
					<option value="faculty">Faculty</option>						
					<option value="publication">Publication</option>
					
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

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

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
					$('#faclnames').html(response.content);
				
					
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
	$('#faclnames').change(function() {
	
		var selectedValue = $(this).val();
		var elem= document.getElementById("universities");		
		var univ = elem.options[elem.selectedIndex].value;		
		var targeturl = $(this).attr('flanmerel') + '?flname=' + selectedValue+'&university_id='+univ;
		
		$.ajax({
			type: 'post',
			url: targeturl,
			beforeSend: function(xhr) {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			},

			
			success: function(response) {
				if (response.content) {
					$('#facfnames').html(response.content);
				
					
				}
			},
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
			}
		});
	});
});

$('#form1').validate({
    rules: {
        'lname_id': {
            required: true,
        },
        
    },
    messages: {
        'lname_id': {
            required: "Please select a Faculty Last Name",
        },
        
    },
});
</script>

