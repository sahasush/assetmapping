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
         
     
        echo $this->Html->css('starter-template.css');
       
        echo  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array('inline' => false));
       echo  $this->Html->script('Twit.bootstrap.min');

        echo  $this->Html->script('Twit.bootstrap-select');
          echo  $this->Html->script('Twit.bootstrap-select.min');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Asset Mapping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/users/home">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Search by<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/universities/search">CSU/College/Department</a></li>
        <li><a href="/faculty/search">Faculty</a></li>        
          <li><a href="/labsCenters/search">Lab/Center</a></li>        
          <li><a href="/themes/search">Theme</a></li>
        </ul>
      </li>
       <li><a href="/users/logout">Logout</a></li>
    </ul>
  </div>
  </nav>
	 <div class="container">

        <?= $this->Flash->render(); ?>
         <br>
<br>
<br>
<br>
<br>
        <?= $this->fetch('content'); ?>
        <footer style="position: fixed; left:0px;bottom: 0px; width: 100%; height: 60px; background-color: black;">
    <font color="white"><p>&copy;<?=date("Y")?> California State University, Northridge</p></font>
  </footer>
      </div>
      
	

</html>