
<div class="container">

		<h3><?= __('Search by Faculty') ?></h3>
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
								
								$empty = $faclnames->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'Please Select' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'Not Available' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								$facfnamempty = $facfnames->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'Please Select' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'Not Available' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								
								
								
								?>
								
					
		 <label class="control-label col-sm-2" for="university">University</label>
			<div class="col-sm-10">	
			<?=  $this->Form->input('university_id', array('label' => false,'type' => 'select','options'=> $universities,'id' => 'universities', 'rel' => $url,'empty'=>'Please Select'));?>
			
			
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
					$('#faclnames').addClass('selectpicker');
					 $('#faclnames').attr('data-live-search', 'true');
					 $('#faclnames').attr('data-width','100%');
					 $('#faclnames').selectpicker('refresh').selectpicker('refresh');
					  $('#facfnames').empty();
					  $('#facfnames').selectpicker('refresh').selectpicker('refresh');
				
					
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
					$('#facfnames').addClass('selectpicker');
					 $('#facfnames').attr('data-live-search', 'true');
					 $('#facfnames').attr('data-width','100%');
					 $('#facfnames').selectpicker('refresh').selectpicker('refresh');
				
					
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
        'fname_id': {
            required: true,
        },
        
    },
    messages: {
        'lname_id': {
            required: "Please select a Faculty Last Name",
        },
        'fname_id': {
            required: "Please select a Faculty First Name",
        },
    },
});

$('#form1').on('reset', function() {
	  var _this = this;	
	  $('#faclnames').empty();
	  $('#faclnames').append('<option value="0" selected="selected">Not Available</option>');
	  $('#facfnames').empty();
	  $('#facfnames').append('<option value="0" selected="selected">Not Available</option>');
	  setTimeout(function() {
		  $('.selectpicker').selectpicker('refresh');
		  
	  });
	});


</script>

