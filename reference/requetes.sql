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