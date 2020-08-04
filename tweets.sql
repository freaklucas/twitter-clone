create table tweets(
    id int not null PRIMARY KEY AUTO_INCREMENT,
    id_usuario int not null,
    tweet varchar(140) not null,
    data datetime default current_timestamp);
