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
        '$2y$10$W1hTEPqUO0M6Bxw1j/NaIeg2Yqx2W2TvyKr8046SIhwQMoKvce1p.'
    ), (
        2,
        'Martin',
        'Pierre',
        'pierre.martin@email.com',
        '$2y$10$9b5G3j8ZUHmWzDo.tmUGG.AjHRru2riDWKlLDJLo6vOjWAtmNONga'
    ), (
        3,
        'Leroy',
        'Marie',
        'marie.leroy@email.com',
        '$2y$10$AppP00wPY74t3xmjE6OlLuQ9tTPPraKrbKC5kN1oZav4wko/NTtzK'
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
    Priority(id_piority, name_priority)
VALUES (1, 'Haute'), (2, 'Moyenne'), (3, 'Basse');

INSERT INTO
    Status(id_status, name_status)
VALUES (1, 'Non débuté'), (2, 'En cours'), (3, 'Terminé');

-- Participation des utilisateurs au projet

INSERT INTO Participate(id_user, id_project) VALUES (2, 1), (3, 1);

-- Création de 2 tâches pour le projet

INSERT INTO
    Tasks(
        id_task,
        title,
        description,
        id_user,
        id_status,
        id_piority,
        id_project
    )
VALUES (
        1,
        'Tâche 1',
        'Description de la tâche 1',
        1,
        1,
        1,
        1
    ), (
        2,
        'Tâche 2',
        'Description de la tâche 2',
        2,
        2,
        2,
        1
    );