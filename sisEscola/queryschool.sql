create database dbEscola;
use dbEscola;

create table usuario(
login int primary key,
senha varchar(20),
cargo char,
ativo char
);
create table tarefas(
id int primary key auto_increment,
nome varchar(20),
descricao varchar(100),
dataa varchar(10)
);

insert into tarefas(nome,descricao,dataa) values ("teste","fazer o teste de software do select","23/19/2019");
insert into tarefas(nome,descricao,dataa) values ("teste","fazer o teste de software de linhas","23/19/2019");
insert into tarefas(nome,descricao,dataa) values ("teste","fazer o teste de software de linhas","25/19/2019");

select * from tarefas;