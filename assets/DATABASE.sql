-- DATABASE


CREATE TABLE IF NOT EXISTS `simples` (
`id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `simples`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `simples`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;




CREATE TABLE IF NOT EXISTS `row_group` (
`id` int(11) NOT NULL,
  `agrupador` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;


INSERT INTO `row_group` (`id`, `agrupador`, `titulo`) VALUES
(1, 'Agrupador 1', 'Texto1 descritivo do Agrupador 1'),
(2, 'Agrupador 1', 'Texto2 descritivo do Agrupador 1'),
(3, 'Agrupador 1', 'Texto3 descritivo do Agrupador 1'),
(4, 'Agrupador 1', 'Texto4 descritivo do Agrupador 1'),
(5, 'Agrupador 1', 'Texto5 descritivo do Agrupador 1'),
(6, 'Agrupador 1', 'Texto6 descritivo do Agrupador 1'),
(7, 'Agrupador 1', 'Texto7 descritivo do Agrupador 1'),
(8, 'Agrupador 1', 'Texto8 descritivo do Agrupador 1'),
(9, 'Agrupador 1', 'Texto9 descritivo do Agrupador 1'),
(10, 'Agrupador 1', 'Texto10 descritivo do Agrupador 1'),
(11, 'Agrupador 1', 'Texto11 descritivo do Agrupador 1'),
(12, 'Agrupador 1', 'Texto12 descritivo do Agrupador 1'),
(13, 'Agrupador 1', 'Texto13 descritivo do Agrupador 1'),
(14, 'Agrupador 1', 'Texto14 descritivo do Agrupador 1'),
(15, 'Agrupador 1', 'Texto15 descritivo do Agrupador 1'),
(16, 'Agrupador 2', 'Texto1 descritivo do Agrupador 2'),
(17, 'Agrupador 2', 'Texto2 descritivo do Agrupador 2'),
(18, 'Agrupador 2', 'Texto3 descritivo do Agrupador 2'),
(19, 'Agrupador 2', 'Texto4 descritivo do Agrupador 2'),
(20, 'Agrupador 2', 'Texto5 descritivo do Agrupador 2'),
(21, 'Agrupador 2', 'Texto6 descritivo do Agrupador 2'),
(22, 'Agrupador 2', 'Texto7 descritivo do Agrupador 2'),
(23, 'Agrupador 2', 'Texto8 descritivo do Agrupador 2'),
(24, 'Agrupador 2', 'Texto9 descritivo do Agrupador 2'),
(25, 'Agrupador 2', 'Texto10 descritivo do Agrupador 2'),
(26, 'Agrupador 2', 'Texto11 descritivo do Agrupador 2'),
(27, 'Agrupador 2', 'Texto12 descritivo do Agrupador 2'),
(28, 'Agrupador 2', 'Texto13 descritivo do Agrupador 2'),
(29, 'Agrupador 2', 'Texto14 descritivo do Agrupador 2'),
(30, 'Agrupador 2', 'Texto15 descritivo do Agrupador 2'),
(31, 'Agrupador 3', 'Texto1 descritivo do Agrupador 3'),
(32, 'Agrupador 3', 'Texto2 descritivo do Agrupador 3'),
(33, 'Agrupador 3', 'Texto3 descritivo do Agrupador 3'),
(34, 'Agrupador 3', 'Texto4 descritivo do Agrupador 3'),
(35, 'Agrupador 3', 'Texto5 descritivo do Agrupador 3'),
(36, 'Agrupador 3', 'Texto6 descritivo do Agrupador 3'),
(37, 'Agrupador 3', 'Texto7 descritivo do Agrupador 3'),
(38, 'Agrupador 3', 'Texto8 descritivo do Agrupador 3'),
(39, 'Agrupador 3', 'Texto9 descritivo do Agrupador 3'),
(40, 'Agrupador 3', 'Texto10 descritivo do Agrupador 3'),
(41, 'Agrupador 3', 'Texto11 descritivo do Agrupador 3'),
(42, 'Agrupador 3', 'Texto12 descritivo do Agrupador 3'),
(43, 'Agrupador 3', 'Texto13 descritivo do Agrupador 3'),
(44, 'Agrupador 3', 'Texto14 descritivo do Agrupador 3'),
(45, 'Agrupador 3', 'Texto15 descritivo do Agrupador 3');

ALTER TABLE `row_group`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `row_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;