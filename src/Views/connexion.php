<main class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="login-form bg-body-tertiary border border-dark rounded p-4 shadow">
    <h1 class="text-center mb-4"><?php echo $titlePage; ?></h1>

    <?php if (isset($errorMessage) && $errorMessage) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errorMessage; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="index.php?controller=Connexion&method=handleSignIn">

      <div class="form-group mb-3">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>

      <button type="submit" class="btn btn-dark w-100">Submit</button>

    </form>
  </div>
</main>