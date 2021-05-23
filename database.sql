-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.17-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sorteio
CREATE DATABASE IF NOT EXISTS `sorteio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sorteio`;

-- Copiando estrutura para tabela sorteio.participantes
CREATE TABLE IF NOT EXISTS `participantes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `sorteado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sorteado_id` (`sorteado_id`),
  CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`sorteado_id`) REFERENCES `sorteados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sorteio.sorteados
CREATE TABLE IF NOT EXISTS `sorteados` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
