create table usuarios_seguidores(
    id int not null primary key auto_increment,
    id_usuario int not null,
    id_usuario_seguindo int not null);
