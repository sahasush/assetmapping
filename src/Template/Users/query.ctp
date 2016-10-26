<nav class="postleft">
    <ul class="side-nav">
        <li ><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="container">
    <h3>Search by.</h3>
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select One
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/themes/search">Theme</a></li>
    <li><a href="#">CSU/College/Department</a></li>
    <li><a href="#">Lab/Center</a></li>
    <li><a href="#">Faculty</a></li>
  </ul>
</div>
  
</div>