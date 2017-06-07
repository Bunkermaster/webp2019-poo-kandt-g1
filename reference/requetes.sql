CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `h1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav-title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_page` tinyint(4) NOT NULL DEFAULT '0',
  `orderfield` int(10) UNSIGNED NOT NULL DEFAULT '10000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `page` (`id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`, `orderfield`) VALUES
  (1, 'Les Teletubbies', 'C\'est flippant. Ouesh gros\r\n<p>lol</p>', 'img/teletubbies.jpg', 'Teletubbiessssss', 'les-teletubbies', 'Teletubbies', 0, 30),
  (2, 'Les Chatons !', 'C\'est mignon.\r\n\r\n', 'img/three_kittens.jpg', 'Kittens', 'les-chatons-wesh-gros', 'Chatons', 0, 10),
  (3, 'Iron Maiden!', 'C\'est vieux.', 'img/ironmaiden.jpg', 'Eddy', 'iron-maiden-ca-pique', 'Ironmaiden', 0, 40),
  (5, 'Les mangas!!!', 'Woooooah la culture Japonaise\r\n\r\n', 'img/manga.jpg', 'Woooooahhh', 'onegai-sshimasu-goshijin-sama', 'Mangaaaa', 1, 20);

ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

INSERT INTO
`page`
(
  `h1`,
  `description`,
  `img`,
  `alt`,
  `slug`,
  `nav-title`
) VALUES (
  :h1,
  :description,
  :img,
  :alt,
  :slug,
  :navtitle
);

UPDATE
  `page`
SET
  `default_page` = if( id = 3, 1, 0)
WHERE
  `default_page` = 1
OR `id` = 3;

UPDATE
  `page`
SET
  `h1` = :h1,
  `description` = :description,
  `img` = :img,
  `alt` = :alt,
  `slug` = :slug,
  `nav-title` = :navtitle,
  `default_page` = :defaultpage
WHERE
  `id` =  :id;

-- OMFG

INSERT INTO `page_sauvegarde`(`id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`)
  SELECT `id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`
FROM `page` WHERE id = 1;

CREATE TABLE `page_sauvegarde` (
  `superid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `h1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav-title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_page` tinyint(4) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `page_sauvegarde` (`superid`, `id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`, `date_create`) VALUES
  (2, 16, 'h1', 'description', 'img', 'alt', 'slug', 'nav-title', 0, '2017-06-06 12:04:15'),
  (3, 17, 'hachin', 'descipornlkbkjhv,jh\r\nklnskdn,v.<b>bold</b><script>alert("trolololol")</script>', 'retwe', 'sfdgfsd', 'sdfgsdf', 'sdfgfdsg', 0, '2017-06-06 15:07:55'),
  (4, 18, 'MONAAAA', 'MONAAAA', 'MONAAAA', 'MONAAAA', 'MONAAAA', 'MONAAAA', 0, '2017-06-06 17:46:20');

ALTER TABLE `page_sauvegarde`
  ADD PRIMARY KEY (`superid`);

ALTER TABLE `page_sauvegarde`
  MODIFY `superid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;