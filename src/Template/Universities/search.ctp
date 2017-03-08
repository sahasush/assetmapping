<div class="container">
		<h3><?= __('Search by CSU/College/Department') ?></h3>
<?= $this->Form->create(null, ['url' => ['controller' => 'Universities', 'action' => 'searchResults' ], 'class' =>'form-horizontal','type' => 'get','id' => 'form1']); ?>

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
								
								$empty = $colleges->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'Please Select' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'Not Available' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								$deptempty = $departments->toArray () ? Configure::read ( 'Select.defaultBefore' ) . __ ( 'Please Select' ) . Configure::read ( 'Select.defaultAfter' ) : [ 
										'0' => Configure::read ( 'Select.naBefore' ) . __ ( 'Not Available' ) . Configure::read ( 'Select.naAfter' ) 
								];
								
								
								
								
								?>

         <div class="form-group">        
         <label class="control-label col-sm-2" for="universities">University</label>
			<div class="col-sm-1">				
			<?=  $this->Form->input('university_id', ['label' => false,'type' => 'select','options'=> $universities,'id' => 'universities', 'rel' => $url,'empty'=>'Please Select', 'required' => true]);?>
			</div>
		</div>
     <div class="form-group">    
            <label class="control-label col-sm-2" for="college">College</label>
            <div class="col-sm-10">	          
				<?= $this->Form->input('college_id', ['label' => false,'id' => 'colleges','empty' => $empty,'collrel' => $collurl ]); ?>  
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
 
    <?= $this->Form->button('Search', ['type' => 'submit','id' => 'save'])?>
  <?= $this->Form->button('Reset', ['type' => 'reset']);?>
  </td>
   <?= $this->Form->end()?>
   
  
   
   </tr>
		</tbody>
		</table>
	</form>
</div>
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>   -->
 <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>


<script>
$(function() {
	$('#universities').change(function() {
	
		var selectedValue = $(this).val();
		var targeturl = $(this).attr('rel') + '?university_id=' + selectedValue;
		 $("#departments")[0].selectedIndex = 0;
		
		$.ajax({
			type: 'post',
			url: targeturl,
			beforeSend: function(xhr) {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			},
			success: function(response) {
				if (response.content) {
					$('#colleges').html(response.content);
					console.log($('#colleges').html());
					 $('#colleges').addClass('selectpicker');
					 $('#colleges').attr('data-live-search', 'true');
					 $('#colleges').attr('data-width','100%');
					 $('#colleges').selectpicker('refresh').selectpicker('refresh');
					  $('#departments').empty();
					  $('#departments').selectpicker('refresh').selectpicker('refresh');			
				
					
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
					 $('#departments').addClass('selectpicker');
					 $('#departments').attr('data-live-search', 'true');
					 $('#departments').attr('data-width','100%');
					 $('#departments').selectpicker('refresh').selectpicker('refresh');			
					
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
        'department_id' : {
            required: true,
        },      
        'college_id': {
            required: true,
        },  
         'university_id': {
            required: true,
        },  
    },
    messages: {
        'department_id': {
            required: "Please select a department",
        },      
        'college_id': {
            required: "Please select a college",
        },   
        'university_id': {
            required: "Please select a university",
        },          
    },
});

$('#form1').on('reset', function() {
	  var _this = this;	
	  $('#colleges').empty();
	  $('#colleges').append('<option value="0" selected="selected">Not Available</option>');
	  $('#departments').empty();
	  $('#departments').append('<option value="0" selected="selected">Not Available</option>');
	  setTimeout(function() {
		  $('.selectpicker').selectpicker('refresh');
		  
	  });
	});


</script>
        
