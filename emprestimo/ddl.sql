Create database emprestimo;

use database emprestimo;
CREATE TABLE `cadastro` (
  `name` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) 

create table item ( item varchar(20), dtEmprestimo varchar(20), prevEntrega varchar(20), dtEntrega varchar(20), status varchar(20))
