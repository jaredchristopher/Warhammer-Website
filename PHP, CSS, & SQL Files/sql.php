
    $db = 'CREATE DATABASE project;';

    $registration = 'CREATE TABLE registration (
                        id int unsigned AUTO_INCREMENT NOT NULL,
                        user VARCHAR(10) NOT NULL,
                        pwd CHAR(64) NOT NULL,
                        PRIMARY KEY(id),
                        UNIQUE(user)
                        );';

    // $admin = 'INSERT INTO registration
    //             (user, pwd)
    //             VALUES
    //             ('admin', 'admin');';
    
    $favorites = 'CREATE TABLE favorites (
                    id int unsigned AUTO_INCREMENT NOT NULL,
                    registration$id int unsigned NOT NULL,
                    mini_name varchar(30) NOT NULL,
                    PRIMARY KEY(id),
                    FOREIGN KEY(registration$id)
                    REFERENCES registration(id)
                    ON DELETE CASCADE
                    );';

    $contact = 'CREATE TABLE contact (
                id int unsigned AUTO_INCREMENT NOT NULL,
                registration$id int unsigned NOT NULL,
                phone int(10) NOT NULL,
                email varchar(30) NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(registration$id)
                REFERENCES registration(id)
                ON DELETE CASCADE
                );';


                INSERT INTO favorites
                (registration$id, mini_name)
                VALUES
                (12, 'Keeper_of_Secrets');
    
INSERT INTO contact
(registration$id, phone, email)
VALUES
(2, 1222200000, 'mejared@gmail.com');