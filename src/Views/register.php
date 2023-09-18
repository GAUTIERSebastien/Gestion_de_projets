<main class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="register-form bg-body-tertiary border border-dark rounded p-4 shadow col-md-4">
        <h1 class="text-center mb-4"><?php echo $titlePage; ?></h1>

        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?controller=Register&method=handleSignUp" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">S'inscrire</button>
        </form>
    </div>
</main>
