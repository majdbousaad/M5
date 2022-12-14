CREATE TABLE benutzer (
                          id int8 primary key auto_increment ,
                          name varchar(200) not null,
                          email varchar(100) not null unique ,
                          passwort varchar(200) not null ,
                          admin boolean not null default false,
                          anzahlfehler int not null default 0,
                          anzahlanmeldungen int not null ,
                          letzteanmeldungen datetime,
                          letzterfehler datetime
);

INSERT INTO benutzer (name, email, passwort, admin, anzahlanmeldungen)
VALUES (admin, 'admin@emensa.example', '306d0847977076b2830e2940fcc7f1125f3bb314',true, 0)