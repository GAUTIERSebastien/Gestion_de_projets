CREATE TABLE
    Users (
        id INT AUTO_INCREMENT,
        email VARCHAR(50) UNIQUE,
        name VARCHAR(50),
        firstname VARCHAR(50),
        password VARCHAR(500),
        PRIMARY KEY(id)
    );

CREATE TABLE
    Projects (
        id INT AUTO_INCREMENT,
        title VARCHAR(50),
        description VARCHAR(50),
        email VARCHAR(50) NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(email) REFERENCES Users(email)
    );

CREATE TABLE
    Priority (
        id INT AUTO_INCREMENT,
        name_priority VARCHAR(50) UNIQUE,
        PRIMARY KEY(id)
    );

CREATE TABLE
    Status (
        id INT AUTO_INCREMENT,
        name_status VARCHAR(50) UNIQUE,
        PRIMARY KEY(id)
    );

CREATE TABLE
    Tasks (
        id INT AUTO_INCREMENT,
        title VARCHAR(50),
        description VARCHAR(100),
        email VARCHAR(50) NOT NULL,
        name_status VARCHAR(50) NOT NULL,
        name_priority VARCHAR(50) NOT NULL,
        id_project INT NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(email) REFERENCES Users(email),
        FOREIGN KEY(name_status) REFERENCES Status(name_status),
        FOREIGN KEY(name_priority) REFERENCES Priority(name_priority),
        FOREIGN KEY(id_project) REFERENCES Projects(id)
    );

CREATE TABLE
    Participate (
        id INT AUTO_INCREMENT,
        email VARCHAR(50),
        id_project INT,
        PRIMARY KEY(id),
        UNIQUE(email, id_project),
        FOREIGN KEY(email) REFERENCES Users(email),
        FOREIGN KEY(id_project) REFERENCES Projects(id)
    );

ALTER TABLE Users ADD is_deleted BOOLEAN DEFAULT FALSE;