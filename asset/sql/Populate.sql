-- Création des utilisateurs

INSERT INTO
    Users(
        id_user,
        name,
        firstname,
        email,
        password
    )
VALUES (
        1,
        'Dupont',
        'Jean',
        'jean.dupont@email.com',
        'password123'
    ),
    -- Ce sera notre administrateur (
        2,
        'Martin',
        'Pierre',
        'pierre.martin@email.com',
        'password456'
    ), (
        3,
        'Leroy',
        'Marie',
        'marie.leroy@email.com',
        'password789'
    );

-- Création d'un projet avec Jean Dupont comme administrateur

INSERT INTO
    Projects(
        id_project,
        title,
        description,
        id_user
    )
VALUES (
        1,
        'Projet Exemple',
        'Description du projet exemple',
        1
    );

-- Création de priorités et statuts pour les tâches

INSERT INTO
    Priority(name_priority)
VALUES ('Haute'), ('Moyenne'), ('Basse');

INSERT INTO
    Status(name_status)
VALUES ('Non débuté'), ('En cours'), ('Terminé');

-- Participation des utilisateurs au projet

-- Jean Dupont est déjà l'administrateur, donc nous ajoutons seulement Pierre et Marie

INSERT INTO Participate(id_user, id_project) VALUES (2, 1), (3, 1);

-- Création de 2 tâches pour le projet

INSERT INTO
    Tasks(
        id_task,
        title,
        description,
        id_user,
        name_status,
        name_priority,
        id_project
    )
VALUES (
        1,
        'Tâche 1',
        'Description de la tâche 1',
        1,
        'Non débuté',
        'Haute',
        1
    ), (
        2,
        'Tâche 2',
        'Description de la tâche 2',
        2,
        'En cours',
        'Moyenne',
        1
    );