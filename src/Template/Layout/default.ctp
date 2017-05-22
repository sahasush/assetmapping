<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CSU Asset Mapping';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset()?>
    <meta name="viewport"
	content="width=device-width, initial-scale=1.0">
<title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title')?>
    </title>
    <?= $this->Html->meta('icon')?>

   <!-- <?= $this->Html->css('base.css')?> -->
   <!--   <?= $this->Html->css('cake.css')?>  -->
    <?= $this->Html->css('custom.css');?>
        <?= $this->Html->css('csun-components.css')?>
         <?= $this->Html->css('csun-apps.css')?>

   
    <?= $this->fetch('meta')?>
    <?= $this->fetch('css')?>
    <?= $this->fetch('script')?>
   <?= $this->Html->script('jquery'); ?> 
    
</head>

<body class="login">
	<div class="header">
		<div class="web-one">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container hidden-xs">
					<div class="row">
				<div class="col-sm-5 col-md-6 col-lg-7">
					<a class="navbar-brand hidden-xs" href="http://www.csun.edu">
						<img src="https://www.csun.edu/faculty/imgs/csun-logo.png" alt="California State University, Northridge - CSUN">
					</a>
					<a class="navbar-brandname hidden-xs" href="">
						<img src="/img/geoglogo.JPG" alt="Asset Database Application">
					</a>
				</div>
				
			</div>
		</div>
				<div class="navbar-bg">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand hidden-sm hidden-md hidden-lg"		style="margin-top: 10px;" href="https://www.csun.edu/faculty"><img
							src="https://www.csun.edu/faculty/imgs/csun-logo.png"	alt="CSUN Faculty Logo"></a> 
							<a	class="navbar-brand hidden-sm hidden-md hidden-lg"	style="margin-top: 1px;" href="">
							<img	src="/img/geoglogo.JPG"		alt="CSUN Asset Database"></a>
					</div>
					<div class="navbar-body">
						<div class="container">
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav navbar-center">
									<li><a href="http://www.csun.edu">CSUN Home Page</a></li>
								</ul>
							</div>
							<!-- /.navbar-collapse -->
						</div>
					</div>
				</div>
			</nav>
		</div>

</div>

			<!-- End  -->


			<div>
      <?= $this->Flash->render()?>
      <br>
        <?= $this->fetch('content')?>
        
    </div>


<footer>
     
<?= $this->fetch('jquery'); ?> <?= $this->fetch('script'); ?>
  
   	 <div class="container">
		<div class="row">
			<div class="col-sm-5">
				<div class="row">
					<div class="col-sm-3 footer-seal">
						<img src="/img/cgs_red_basic.png"
							alt="Seal for California State University, Northridge">
					</div>
					<div class="col-sm-9">
						<ul class="list-unstyled">
							<li><strong>Geography</strong> <br>&copy; California State
								University, Northridge</li>
							<li>18111 Nordhoff Street, Northridge, CA 91330</li>
							<li>Phone: (818) 677-1200 / <a
								href="http://www.csun.edu/contact/" target="_blank">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="row">
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.csun.edu/emergency/" target="_blank">Emergency
									Information</a></li>
							<li><a
								href="http://www.csun.edu/afvp/university-policies-procedures/"
								target="_blank">University Policies &amp; Procedures</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.csun.edu/sites/default/files/900-12.pdf"
								target="_blank">Terms and Conditions for Use</a></li>
							<li><a
								href="http://www.csun.edu/sites/default/files/500-8025.pdf"
								target="_blank">Privacy Policy</a></li>
							<li><a href="http://www.csun.edu/it/document-viewers"
								target="_blank">Document Reader</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="list-unstyled">
							<li><a href="http://www.calstate.edu/" target="_blank">California
									State University</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


</footer>

</html>
