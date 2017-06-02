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
