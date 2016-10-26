
<div class="posleft">
<ul>
        <li class="list-inline"><?= __('Select One') ?></li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?></li>
         <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Search Theme'), ['action' => 'search']) ?> </li>
    </ul>

</div>

<div class="container">

<h3><?= __('Universities') ?></h3>
<?= $this->Form->create(); ?>


<table class='table borderless' cellpadding="10" >
   <tbody>
      <tr >
         <td>
          <!-- <div class="form-group"> -->
          
          
                
        <?php
		
		
		
		$url =$this->Url->build(['controller' => 'universities', 'action' =>'univCollegesAjax','_ext' => 'json']);
		echo $url;

		
		$empty = $colleges->toArray() ?Configure::read('Select.defaultBefore') . __('pleaseSelect') . Configure::read('Select.defaultAfter') : ['0' => Configure::read('Select.naBefore') . __('noOptionAvailable') . Configure::read('Select.naAfter')];
		
		echo $this->Form->input('university_id', ['id' => 'universities', 'rel' => $url]);
		echo $this->Form->input('college_id', ['id' => 'colleges', 'empty' => $empty]);
	?>
            </td>
            <td>
            
          
            
            
            </td>
            <td>  
            
              <div class="input select">
            <label for="datacomponents">Data Components</label>           
            <select  class="selectpicker" data-live-search="true" name="Datacomponent" id="Datacomponent">
               <option value="degree">Degrees</option>
               <option value="courses">Courses</option>
               <option value="centers">Labs/Centers</option>
               <option value="faculty">Faculty</option>
            </select>
           
            </div>
            </td>
      </tr>
      <tr >
     
      <td>
      <br>
        <?= $this->Form->button('Search', ['type' => 'submit']) ?>
      
             
   <?= $this->Form->button('Reset', ['type' => 'reset']); ?>
   
  </td>
   <?= $this->Form->end()?>
   
  
   
   </tr>
   </tbody>
</table>
 
</div>



 <script>
$(function() {
	$('#universities').change(function() {
	
		var selectedValue = $(this).val();
		var targeturl = $(this).attr('rel') + '?university_id=' + selectedValue;
		alert(targeturl);
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
</script>

