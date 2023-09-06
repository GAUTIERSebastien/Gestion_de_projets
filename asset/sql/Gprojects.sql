CREATE TABLE
    Users(
        id_user INT,
        name VARCHAR(50),
        firstname VARCHAR(50),
        email VARCHAR(50),
        password VARCHAR(50),
        PRIMARY KEY(id_user)
    );

CREATE TABLE
    Projects(
        id_project INT,
        title VARCHAR(50),
        description VARCHAR(100),
        id_user INT NOT NULL,
        PRIMARY KEY(id_project),
        FOREIGN KEY(id_user) REFERENCES Users(id_user)
    );

CREATE TABLE
    Priority(
        name_priority VARCHAR(50),
        PRIMARY KEY(name_priority)
    );

CREATE TABLE
    Status(
        name_status VARCHAR(50),
        PRIMARY KEY(name_status)
    );

CREATE TABLE
    Tasks(
        id_task INT,
        title VARCHAR(50),
        description VARCHAR(100),
        id_user INT NOT NULL,
        name_status VARCHAR(50) NOT NULL,
        name_priority VARCHAR(50) NOT NULL,
        id_project INT NOT NULL,
        PRIMARY KEY(id_task),
        FOREIGN KEY(id_user) REFERENCES Users(id_user),
        FOREIGN KEY(name_status) REFERENCES Status(name_status),
        FOREIGN KEY(name_priority) REFERENCES Priority(name_priority),
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