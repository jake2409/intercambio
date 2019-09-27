create database dbCidade;
use dbCidade;

create table usuario(
id int primary key auto_increment,
login varchar(10),
senha varchar(10),
ativo char
);
create table conograma(
id int primary key auto_increment,
tarefas varchar(80),
duracao varchar(10),
inicio varchar(10),
final varchar(10),
prioridade smallint,
funcionario varchar(30),
estatus varchar(4)
);
select * from conograma;
insert into usuario(login,senha,ativo) values ("123","123","s");
insert into conograma(tarefas,duracao,inicio,final,prioridade,funcionario,estatus) values ("teste","4:00","24-09-2019","24-09-2019","1","Gabriel","ok");