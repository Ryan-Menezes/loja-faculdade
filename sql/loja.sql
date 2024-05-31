-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para loja
CREATE DATABASE IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `loja`;

-- Copiando estrutura para tabela loja.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(20,2) NOT NULL,
  `quantidade` int NOT NULL DEFAULT '1',
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `produtos` (`id`, `nome`, `slug`, `preco`, `quantidade`, `imagem`, `descricao`) VALUES
	(1, 'Tênis Adidas Breaknet Masculino - Branco+Preto', 'tenis-adidas-breaknet-masculino-branco-preto', 199.99, 20, 'produtos/9766c33d91acf7a097c52ebb5b818d81-2024-05-30-23-17-16.webp', 'Para um melhor ajuste nos pés, recomendamos a compra de um tamanho menor do que o seu usual. Forma grande.* Estilo atemporal para diversos momentos e combinações. Com modelo clássico, o tênis adidas Breaknet traz as listras icônicas da marca nas laterais, com opções de cores lisas e também animal print. É confeccionado com material resistente e firme, com perfuros para respirabilidade, forro acolchoado e solado resistente ao desgaste. Um tênis masculino versátil para usar com peças que vão da calça jeans à calça jogger ou bermudas masculinas. Conte com a Adidas para complementar o seu look urbano!'),
	(2, 'Tênis Adidas Response Runner - Preto+Branco', 'tenis-adidas-response-runner-preto-branco', 239.99, 20, 'produtos/56bddc23f8ea081659ef9634dc5c1787-2024-05-30-23-19-57.webp', 'Estilo e conforto nas corridas e no dia a dia. O tênis adidas Response Runner traz design esportivo leve e macio, com cabedal em malha elástica que proporciona ajuste suave e favorece a circulação de ar. A entressola de EVA eleva o nível de maciez, enquanto o solado de borracha garante tração e durabilidade. Suporte para te acompanhar nas corridas e estilo versátil para usar também nos looks casuais, sempre com bem-estar total. Combine com peças que vão do short esportivo com camiseta lisa ou estampada ao seu jeans favorito. Aproveite!'),
	(3, 'Tênis Adidas Response Runner - Preto+Amarelo', 'tenis-adidas-response-runner-preto-amarelo', 242.49, 20, 'produtos/17692c63450bb6cd07297d6e1279a021-2024-05-30-23-20-52.webp', 'Estilo e conforto nas corridas e no dia a dia. O tênis adidas Response Runner traz design esportivo leve e macio, com cabedal em malha elástica que proporciona ajuste suave e favorece a circulação de ar. A entressola de EVA eleva o nível de maciez, enquanto o solado de borracha garante tração e durabilidade. Suporte para te acompanhar nas corridas e estilo versátil para usar também nos looks casuais, sempre com bem-estar total. Combine com peças que vão do short esportivo com camiseta lisa ou estampada ao seu jeans favorito. Aproveite!'),
	(4, 'Tênis Adidas Breaknet Masculino - Off White+Preto', 'tenis-adidas-breaknet-masculino-off-white-preto', 199.99, 20, 'produtos/49b521837bbbda391ad35737d20473dd-2024-05-30-23-21-37.webp', 'Para um melhor ajuste nos pés, recomendamos a compra de um tamanho menor do que o seu usual. Forma grande.* Estilo atemporal para diversos momentos e combinações. Com modelo clássico, o tênis adidas Breaknet traz as listras icônicas da marca nas laterais, com opções de cores lisas e também animal print. É confeccionado com material resistente e firme, com perfuros para respirabilidade, forro acolchoado e solado resistente ao desgaste. Um tênis masculino versátil para usar com peças que vão da calça jeans à calça jogger ou bermudas masculinas. Conte com a Adidas para complementar o seu look urbano!'),
	(5, 'Tênis Mormaii Urban One Masculino - Preto+Grafite', 'tenis-mormaii-urban-one-masculino-preto-grafite', 179.90, 20, 'produtos/508d67e1815b9bc5e1350372b62e6b6e-2024-05-30-23-22-46.webp', 'Dê um passo à frente com o Tênis Mormaii Urban One Masculino. Com design moderno, garante conforto em cada passo. Combine-o com calça jogger e uma camiseta básica para um visual casual e despojado, perfeito para o dia a dia. Liberte seu estilo nas ruas com a autenticidade e qualidade que só a Mormaii proporciona. Garanta agora!');

-- Copiando dados para a tabela loja.produtos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela loja.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `usuarios` (`id`, `nome`, `username`, `senha`) VALUES (1, 'Administrador', 'admin', '$2a$12$NpjOYFmQUr9bFeUMqk0HcOCcsZ1ra8TxNemB1sOUcvVipG7O3on9i'); -- Senha: 123

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
