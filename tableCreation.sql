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

-- Table Track
create table `track`
(
    id       int(3)      not null primary key auto_increment,
    title    varchar(50) not null,
    artist   varchar(50) not null,
    filename varchar(50) not null,
    duration int(3)      not null
);

-- Table Playlist
create table `playlist`
(
    id_playlist int(3)      not null auto_increment primary key,
    title       varchar(50) not null,
    size        int(3)      not null,
    duration    int(6)      not null
);

-- Table User2playlist
create table `user2playlist`
(
    id_playlist int(3)       not null,
    id_user     varchar(256) not null,
    primary key (id_playlist, id_user)
);

alter table user2playlist
    add constraint u2p_playlist foreign key (id_playlist) references playlist (id_playlist);
alter table user2playlist
    add constraint u2p_user foreign key (id_user) references user (email);

-- Table playlist2track
create table `playlist2track`
(
    id_playlist int(3) not null,
    id_track    int(3) not null,
    primary key (id_playlist, id_track)
);

alter table playlist2track
    add constraint p2t_playlist foreign key (id_playlist) references playlist (id_playlist);
alter table playlist2track
    add constraint p2t_track foreign key (id_track) references track (id);