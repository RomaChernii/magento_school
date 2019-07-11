create table comment (
    id int not null primary key auto_increment,
    user_first_name varchar(255) not null,
    user_last_name  varchar(255) not null,
    user_email      varchar(255) not null,
    comment         varchar(65536) not null,
    post_id int not null,
    status int not null
);