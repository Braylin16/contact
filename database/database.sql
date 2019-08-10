CREATE TABLE contact(
    id              int(11) auto_increment primary key,
    name            varchar(100) not null,
    email           varchar(100) not null,
    messege         text
)ENGINE=InnoDb;