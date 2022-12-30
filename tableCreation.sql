-- File to create tables for the site
-- Tables are created in MariaDB

-- Table User
create table `user`
(
    email    varchar(256) not null primary key,
    password varchar(256) not null,
    role     int(3)       not null default 1
);

-- Table Profile
create table `profile`
(
    email      varchar(256) not null primary key,
    name       varchar(50)  not null,
    surname    varchar(50)  not null,
    age        int(3)       not null,
    pref_style varchar(50)  not null
);

alter table profile
    add constraint userToProfile foreign key (email) references user (email);