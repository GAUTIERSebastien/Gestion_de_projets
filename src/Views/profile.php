<main class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="profile-form bg-body-tertiary border border-dark rounded p-4 shadow col-md-4">
        <h1 class="text-center mb-4">Profil</h1>

        <!-- Lien vers les projets de l'utilisateur -->
        <div class="mb-4">
            <h3>Mes projets :</h3>
            <a class="btn btn-warning mb-2" href="/index.php?controller=Project&method=create">Nouveau projet</a>
            <ul>
                <?php foreach ($projects as $project) : ?>
                    <li>
                        <a href="index.php?controller=Project&method=showProject&id=<?php echo $project->getId(); ?>">

                            <?php echo $project->getTitle(); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <form method="post" action="index.php?controller=Profile&method=update">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->getName(); ?>">
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->getFirstname(); ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->getPassword(); ?>" placeholder="Saisissez votre mot de passe pour mettre à jour le profil">
            </div>

            <button type="submit" class="btn btn-dark w-100 mb-3">Mettre à jour</button>
        </form>

        <form method="post" action="index.php?controller=Profile&method=delete">
            <button type="submit" class="btn btn-danger w-100">Supprimer le compte</button>
        </form>
    </div>
</main>