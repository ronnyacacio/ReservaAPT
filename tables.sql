create table professor(
	id_professor serial not null,
	login varchar(50) primary key not null,
	nome varchar(20) not null,
	sobrenome varchar(20) not null,
	tipo boolean not null,
	senha varchar(20) not null
);

create table equipamento(
	id_equipamento serial not null,
	nome varchar(50) primary key not null,
	status boolean not null
);

drop table reserva;
create table reserva(
	id_reserva serial not null,
	nome_equipamento varchar(50) not null,
	login_professor varchar(20) not null,
	data_reserva date not null,
	data_entrega date not null,
	status boolean not null
);

alter table reserva add constraint pk_reserva primary key (login_professor, nome_equipamento);

alter table reserva add constraint fk1_reserva foreign key (login_professor)
references professor (login);

alter table reserva add constraint fk2_reserva foreign key (nome_equipamento)
references equipamento (nome);