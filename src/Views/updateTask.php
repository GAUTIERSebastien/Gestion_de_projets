<main class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="register-form bg-body-tertiary border border-dark rounded p-4 shadow col-md-4">
        <h1 class="text-center mb-4">Modifier la tâche</h1>

        <form action="index.php?controller=Task&method=update&id=<?php echo $task->getId(); ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="title" class="form-control" id="title" name="title" value="<?php echo $task->getTitle() ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="description" class="form-control" id="description" name="description" value="<?php echo $task->getDescription() ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_status" class="form-label">Statut</label>
                <select class="form-control" id="id_status" name="id_status">
                    <?php foreach ($statuses as $status) : ?>
                        <option value="<?php echo $status->getId(); ?>" <?php echo ($status->getId() == $task->getIdStatus()) ? 'selected' : ''; ?>>
                            <?php echo $status->getName(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-dark w-100">Enregistrer</button>
        </form>
    </div>
</main>