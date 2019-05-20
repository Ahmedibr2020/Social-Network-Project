DROP DATABASE IF EXISTS socialnetwork;
CREATE DATABASE socialnetwork;

CREATE TABLE users (
user_id             INT NOT NULL AUTO_INCREMENT,
user_firstname      VARCHAR(20) NOT NULL,
user_lastname       VARCHAR(20) NOT NULL,
user_nickname       VARCHAR(20),
user_password       VARCHAR(255) NOT NULL,
user_email          VARCHAR(255) NOT NULL,
user_gender         CHAR(1) NOT NULL,
user_birthdate      DATE NOT NULL,
user_status         CHAR(1),
user_about          TEXT,
user_hometown       VARCHAR(255),
PRIMARY KEY (user_id)
);

CREATE TABLE friendship (
user1_id            INT NOT NULL,
user2_id            INT NOT NULL,
friendship_status   INT NOT NULL,
FOREIGN KEY (user1_id) REFERENCES users(user_id),
FOREIGN KEY (user2_id) REFERENCES users(user_id)
);
CREATE TABLE notifications (
usr1_id            INT NOT NULL,
usr2_id            INT NOT NULL,
po_id             INT NOT NULL,
notif_status       INT NOT NULL,
FOREIGN KEY (usr1_id) REFERENCES users(user_id),
FOREIGN KEY (usr2_id) REFERENCES users(user_id)
);

CREATE TABLE posts (
post_id             INT NOT NULL AUTO_INCREMENT,
post_caption        TEXT NOT NULL,
post_time           TIMESTAMP NOT NULL,
post_public         CHAR(1) NOT NULL,
post_by             INT NOT NULL,
PRIMARY KEY (post_id),
FOREIGN KEY (post_by) REFERENCES users(user_id)
);
CREATE TABLE likes (
like_id              INT NOT NULL AUTO_INCREMENT,
p_id                 INT NOT NULL ,
liked_by             INT NOT NULL,
like_status          INT NOT NULL,

PRIMARY KEY (like_id),
FOREIGN KEY (p_id) REFERENCES posts(post_id),
FOREIGN KEY (liked_by) REFERENCES users(user_id)
);

CREATE TABLE user_phone (
user_id         INT,
user_phone      INT,
FOREIGN KEY (user_id) REFERENCES users(user_id)
);






INSERT INTO users(user_firstname, user_lastname, user_password, user_email, user_gender, user_birthdate)
       VALUES ("Ahmed", "Ibrahim", md5( "123456"),"ahmed@gmail.com", "M", "2001-02-05");
INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
       VALUES ("Ali", "Zaki", "Lolo",md5( "123456"), "ali@gmail.com", "M", "1998-12-19", "S");
INSERT INTO users(user_firstname, user_lastname, user_password, user_email, user_gender, user_birthdate)
       VALUES ("Islam", "Mostafa", md5( "123456"),"islam@gmail.com", "M", "1996-01-18");
INSERT INTO users(user_firstname, user_lastname, user_password, user_email, user_gender, user_birthdate, user_status)
       VALUES ("Aya", "Saad",md5( "123456"), "aya@gmail.com", "F", "1994-04-18", "M");
INSERT INTO users(user_firstname, user_lastname, user_password, user_email, user_gender, user_birthdate)
       VALUES ("Mohamed", "Fawzy",md5( "123456"), "mohamed@gmail.com", "M", "1994-06-06");


INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (2,1,1);
INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (2,3,1);
INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (2,4,1);

INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (1,5,1);
INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (3,5,1);
INSERT INTO friendship(user1_id, user2_id, friendship_status) VALUES (4,5,1);

INSERT INTO notifications(usr1_id, usr2_id, po_id,notif_status) VALUES (1,5,5,0);
INSERT INTO notifications(usr1_id, usr2_id, po_id,notif_status) VALUES (3,5,6,0);
INSERT INTO notifications(usr1_id, usr2_id, po_id,notif_status) VALUES (4,5,5,0);
