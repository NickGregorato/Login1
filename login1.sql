

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` text NOT NULL,
  `endereco` text NOT NULL,
  `bairro` text NOT NULL,
  `cep` int(9) NOT NULL,
  `cidade` text NOT NULL,
  `estado` enum('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO','DF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

