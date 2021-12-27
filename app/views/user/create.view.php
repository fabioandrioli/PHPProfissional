<form method="post" action="/user/store">
    <div class="mt-3 mb-3 row">
        <?= getFlash('name') ?>
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="Luck Dog">
        </div>
  </div>
    <div class="mt-3 mb-3 row">
        <?= getFlash('email') ?>
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" value="luck.dog@gmailc.om">
        </div>
    </div>
    <div class="mb-3 row">
     <?= getFlash('password') ?>
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" value="12345678" class="form-control" id="inputPassword">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-info" type="submit">CADASTRAR</button>
    </div>
</form>