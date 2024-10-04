create database WP;

use WP;

create table fleet
(
    id serial primary key,
    make varchar(20),
    model varchar(30),
    manufactured year
);


alter table fleet
add image varchar(255);