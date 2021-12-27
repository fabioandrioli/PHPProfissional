<form method="post" action="/login">
<div class="mt-3 mb-3 row">
    <?= getFlash('message') ?>
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" value="fabio.drioli@gmail.com">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" value="12345678" class="form-control" id="inputPassword">
    </div>
  </div>
  <div class="d-flex justify-content-center">
      <button class="btn btn-info" type="submit">LOGAR</button>
  </div>
</form>