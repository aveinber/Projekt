CREATE TABLE IF NOT EXISTS `aveinber_kasutajad` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nimi` varchar(50),
  `parool` varchar(15),
  `privileeg` varchar(15)
);
INSERT INTO `aveinber_kasutajad` (`id`, `nimi`, `parool`, `privileeg`) VALUES
(NULL, 'test', 'test', 'admin'),
(NULL, 'aveinber', 'parool2', 'NULL');

CREATE TABLE IF NOT EXISTS `aveinber_pildid` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nimi` varchar(50),
  `pealkiri` varchar(50),
  `kirjeldus` varchar(50),
  `pildistaja` varchar(10)
);

NSERT INTO `aveinber_pildid` (`id`, `nimi`, `pealkiri`, `kirjeldus`, `pildistaja`) VALUES
(NULL, 'fiji.jpg', 'FIJI', 'Meie parim koer', '1'),
(NULL, 'fiji2.jpg', 'FIJI2', 'Maailma parim koer', '1');