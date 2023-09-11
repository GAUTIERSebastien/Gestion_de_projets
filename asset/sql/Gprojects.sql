CREATE TABLE
    Users(
        id_user INT,
        email VARCHAR(50) NOT NULL,
        name VARCHAR(50),
        firstname VARCHAR(50),
        password VARCHAR(500),
        PRIMARY KEY(id_user)
    );

CREATE TABLE
    Projects(
        id_project INT,
        title VARCHAR(50),
        description VARCHAR(50),
        id_user INT NOT NULL,
        PRIMARY KEY(id_project),
        FOREIGN KEY(id_user) REFERENCES Users(id_user)
    );

CREATE TABLE
    Priority(
        id_priority INT,
        name_priority VARCHAR(50) NOT NULL,
        PRIMARY KEY(id_piority)
    );

CREATE TABLE
    Status(
        id_status INT,
        name_status VARCHAR(50) NOT NULL,
        PRIMARY KEY(id_status)
    );

CREATE TABLE
    Tasks(
        id_task INT,
        title VARCHAR(50),
        description VARCHAR(100),
        id_user INT NOT NULL,
        id_status INT NOT NULL,
        id_priority INT NOT NULL,
        id_project INT NOT NULL,
        PRIMARY KEY(id_task),
        FOREIGN KEY(id_user) REFERENCES Users(id_user),
        FOREIGN KEY(id_status) REFERENCES Status(id_status),
        FOREIGN KEY(id_piority) REFERENCES Priority(id_piority),
        FOREIGN KEY(id_project) REFERENCES Projects(id_project)
    );

CREATE TABLE
    Participate(
        id_user INT,
        id_project INT,
        PRIMARY KEY(id_user, id_project),
        FOREIGN KEY(id_user) REFERENCES Users(id_user),
        FOREIGN KEY(id_project) REFERENCES Projects(id_project)
    );

ALTER TABLE Users ADD is_deleted BOOLEAN DEFAULT FALSE;

ALTER TABLE Tasks MODIFY id_task INT AUTO_INCREMENT;