<?php
$cakeDescription = '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription; ?>:
        <?= $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap.css');
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-select.css');
        echo $this->Html->css('bootstrap-select.min.css');
        echo $this->Html->css('tableformat.css');
        echo $this->Html->css('bootstrap-responsive.css');
        //Csun Formatting
        echo $this->Html->css('csun-components.css');
        echo $this->Html->css('csun-apps.css');
         
     
        echo $this->Html->css('starter-template.css');
       
        echo  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array('inline' => false));

       echo  $this->Html->script('Twit.bootstrap.min');
       echo $this->fetch('meta');
       echo $this->fetch('css');
       echo $this->fetch('script');

        echo  $this->Html->script('Twit.bootstrap-select');
          echo  $this->Html->script('Twit.bootstrap-select.min');
       
        
    ?>
    
    <?php $user = $this->request->session()->read('Auth.User');
               $role = $this->request->session()->read ( 'User.role' );
        
          ?> 
  </head>
  <body>
<div class="header">
		<div class="web-one">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container hidden-xs">
			<div class="row">
				<div class="col-sm-5 col-md-6 col-lg-7">
					<a class="navbar-brand hidden-xs" href="http://www.csun.edu">
						<img src="https://www.csun.edu/faculty/imgs/csun-logo.png" alt="California State University, Northridge - CSUN">
					</a>
					<a class="navbar-brandname hidden-xs" href="https://www.csun.edu/faculty">
						<img src="https://www.csun.edu/faculty/imgs/faculty-logo.png" alt="META Lab Faculty Application">
					</a>
				</div>
				<ul class="list-inline mini-nav pull-right">
					<li><a href="#main-content">Skip to content</a></li>|
					<li><a href="http://www.csun.edu/universaldesigncenter">Accessibility</a></li>|
					<li><a href="https://mynorthridge.csun.edu/psc/PANRPRD/EMPLOYEE/EMPL/c/NRPA_CSUN_APPS.NR_PEOPLESRCH_CMP.GBL">Directory</a></li>|
					<li><a href="http://www.csun.edu/calendar">Calendar</a></li>|
					<li><a href="http://www.csun.edu/atoz/">A to Z</a></li>|
					<li><a href="http://www.csun.edu/it/webmail">Webmail</a></li>
				</ul>
			</div>
		</div>
		<div class="navbar-bg">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-sm hidden-md hidden-lg" style="margin-top: 10px;" href="https://www.csun.edu/faculty"><img src="https://www.csun.edu/faculty/imgs/csun-logo.png" alt="CSUN Faculty Logo"></a>
				<a class="navbar-brand hidden-sm hidden-md hidden-lg" style="margin-top: 1px;" href="https://www.csun.edu/faculty"><img src="https://www.csun.edu/faculty/imgs/faculty-logo-sm.png" alt="CSUN Faculty Logo"></a>
			</div>
			<div class="navbar-body">
				<div class="container">
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-center">
							<li><a href="/users/home">Home</a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Search by<span class="caret"></span></a>
							 <ul class="dropdown-menu">
					        <li><a href="/universities/search">CSU/College/Department</a></li>
					        <li><a href="/faculty/search">Faculty</a></li>        
					          <li><a href="/labsCenters/search">Lab/Center</a></li>        
					          <li><a href="/themes/search">Theme</a></li>
					         
					        </ul>
					      </li>
					        <?php if ($role == 'Admin'): ?>
											<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Tables<span class="caret"></span></a>
															 <ul class="dropdown-menu">
															    <li><a href="/colleges/index">Colleges</a></li> 	
													             <li><a href="/faculty/index">Faculty</a></li>        		
													              <li><a href="/labscenters/index">Lab/Centers</a></li> 										      
					        </ul>
					      </li>
	 					<?php endif; ?>
							<li class=""><a href="/users/logout">Logout</a></li>
						
								</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</div>
		</div>
	</nav>
</div>
   
	 <div>

        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content'); ?>
        
        <br>
        <br>
        <div class="section">
        <footer >
   	 <div class="container">
		<div class="row">
			<div class="col-sm-5">
				<div class="row">
					<div class="col-sm-3 footer-seal">
						<img src="https://www.csun.edu/faculty/imgs/footer-seal.png" alt="Seal for California State University, Northridge">						
					</div>
					<div class="col-sm-9">
						<ul class="list-unstyled">
							<li><strong>Geography</strong> <br>&copy; California State University, Northridge</li>
							<li>18111 Nordhoff Street, Northridge, CA 91330</li>
							<li>Phone: (818) 677-1200 / <a href="http://www.csun.edu/contact/" target="_blank">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="row">
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.csun.edu/emergency/" target="_blank">Emergency Information</a></li>
							<li><a href="http://www.csun.edu/afvp/university-policies-procedures/" target="_blank">University Policies &amp; Procedures</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.csun.edu/sites/default/files/900-12.pdf" target="_blank">Terms and Conditions for Use</a></li>
							<li><a href="http://www.csun.edu/sites/default/files/500-8025.pdf" target="_blank">Privacy Policy</a></li>
							<li><a href="http://www.csun.edu/it/document-viewers" target="_blank">Document Reader</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.calstate.edu/" target="_blank">California State University</a></li>
						</ul>
											</div>
				</div>
			</div>
		</div>
</div>
  </footer>
 </div>
      </div>
      
	

</html>