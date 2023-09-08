-- Création des utilisateurs

INSERT INTO
    Users(
        name,
        firstname,
        email,
        password
    )
VALUES (
        'Dupont',
        'Jean',
        'jean.dupont@email.com',
        '$2y$10$W1hTEPqUO0M6Bxw1j/NaIeg2Yqx2W2TvyKr8046SIhwQMoKvce1p.'
    ), (
        'Martin',
        'Pierre',
        'pierre.martin@email.com',
        '$2y$10$9b5G3j8ZUHmWzDo.tmUGG.AjHRru2riDWKlLDJLo6vOjWAtmNONga'
    ), (
        'Leroy',
        'Marie',
        'marie.leroy@email.com',
        '$2y$10$AppP00wPY74t3xmjE6OlLuQ9tTPPraKrbKC5kN1oZav4wko/NTtzK'
    );

-- Création d'un projet avec Jean Dupont comme administrateur

INSERT INTO
    Projects(title, description, email)
VALUES (
        'Projet Exemple',
        'Description du projet exemple',
        'jean.dupont@email.com'
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

INSERT INTO
    Participate(email, id_project)
VALUES ('pierre.martin@email.com', 1), ('marie.leroy@email.com', 1);

-- Création de 2 tâches pour le projet

INSERT INTO
    Tasks(
        title,
        description,
        email,
        name_status,
        name_priority,
        id_project
    )
VALUES (
        'Tâche 1',
        'Description de la tâche 1',
        'jean.dupont@email.com',
        'Non débuté',
        'Haute',
        1
    ), (
        'Tâche 2',
        'Description de la tâche 2',
        'pierre.martin@email.com',
        'En cours',
        'Moyenne',
        1
    );