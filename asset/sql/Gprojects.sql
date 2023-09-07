CREATE TABLE
    Users(
        email VARCHAR(50),
        name VARCHAR(50),
        firstname VARCHAR(50),
        password VARCHAR(500),
        PRIMARY KEY(email)
    );

CREATE TABLE
    Projects(
        id_project INT,
        title VARCHAR(50),
        description VARCHAR(50),
        email VARCHAR(50) NOT NULL,
        PRIMARY KEY(id_project),
        FOREIGN KEY(email) REFERENCES Users(email)
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
        email VARCHAR(50) NOT NULL,
        name_status VARCHAR(50) NOT NULL,
        name_priority VARCHAR(50) NOT NULL,
        id_project INT NOT NULL,
        PRIMARY KEY(id_task),
        FOREIGN KEY(email) REFERENCES Users(email),
        FOREIGN KEY(name_status) REFERENCES Status(name_status),
        FOREIGN KEY(name_priority) REFERENCES Priority(name_priority),
        FOREIGN KEY(id_project) REFERENCES Projects(id_project)
    );

CREATE TABLE
    Participate(
        email VARCHAR(50),
        id_project INT,
        PRIMARY KEY(email, id_project),
        FOREIGN KEY(email) REFERENCES Users(email),
        FOREIGN KEY(id_project) REFERENCES Projects(id_project)
    );