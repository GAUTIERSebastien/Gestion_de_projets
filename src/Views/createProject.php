<main class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="create-project-form bg-body-tertiary border border-dark rounded p-4 shadow col-md-4">
        <h1 class="text-center mb-4">Nouveau Projet</h1>
        <form method="post" action="index.php?controller=Project&method=create">
            <div class="mb-3">
                <label for="title" class="form-label">Titre du Projet</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-dark w-100 mb-3">Créer le projet</button>
        </form>
    </div>
</main>