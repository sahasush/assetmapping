<div class="container">
<h1> Login</h1>
<br>
<?= $this->Form->create() ?>
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" name="username" id="username" />
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control form-control-lg" name="password" id="password" />
      </div>
      </div>
       <div class="form-group row">
       <div class="col-sm-10">
      <?= $this->Form->button('Login') ?>
      </div>
      </div>
    
 <?= $this->Form->end() ?>
</div>

