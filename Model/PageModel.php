<?php

namespace Bunkermaster\Model;

use Bunkermaster\Helper\DB;
use Bunkermaster\Helper\Model;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Model
 */
class PageModel extends Model
{
    /**
     * @param null|string $slug
     * @param null|int $id
     * @param null|bool $default
     * @return array
     */
    private function getAll($slug = null, $id = null, $default = null)
    {
        $sql = "SELECT 
  `id`, 
  `h1`, 
  `description`, 
  `img`, 
  `alt`, 
  `slug`, 
  `nav-title`,
  `default_page`
FROM 
  `page` 
";
        $sqlCond = [];
        if(!is_null($slug)){
            $sqlCond[] = "`slug` = :slug\n";
        }
        if(!is_null($id)){
            $sqlCond[] = "`id` = :id\n";
        }
        if(true === $default){
            $sqlCond[] = "`default_page` = 1\n";
        }
        if(count($sqlCond) > 0){
            $sql .= "WHERE\n" . implode("  AND ", $sqlCond);
        }
//        $db = DB::get();
//        $stmt = $db->prepare($sql);
        $stmt = DB::get()->prepare($sql);
        if(!is_null($slug)){
            $stmt->bindValue(':slug', $slug);
        }
        if(!is_null($id)){
            $stmt->bindValue(':id', $id);
        }
        $stmt->execute();
        $this->errorManagement($stmt);

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function getList()
    {

        return $this->getAll();
    }

    /**
     * @param $slug
     * @return array
     */
    public function getBySlug($slug)
    {

        return current($this->getAll($slug));
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {

        return current($this->getAll(null, $id));
    }

    /**
     * @return array
     */
    public function getDefault()
    {

        return current($this->getAll(null, null, true));
    }

    /**
     *
     */
    public function update(array $data)
    {
        $sql = "UPDATE
  `page`
SET
  `h1` = :h1,
  `description` = :description,
  `img` = :img,
  `alt` = :alt,
  `slug` = :slug,
  `nav-title` = :navtitle
WHERE
  `id` =  :id;
";
        $stmt = DB::get()->prepare($sql);
        $stmt->bindValue(":h1", $data['h1']);
        $stmt->bindValue(":description", $data['description']);
        $stmt->bindValue(":img", $data['img']);
        $stmt->bindValue(":alt", $data['alt']);
        $stmt->bindValue(":slug", $data['slug']);
        $stmt->bindValue(":navtitle", $data['nav-title']);
        $stmt->bindValue(":id", $data['id']);
        $stmt->execute();
        $this->errorManagement($stmt);

        return true;
    }

    /**
     * @param $data
     * @return bool
     */
    public function add(array $data)
    {
        $sql = "INSERT INTO
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
        ";
        $stmt = DB::get()->prepare($sql);
        $stmt->bindValue(":h1", $data['h1']);
        $stmt->bindValue(":description", $data['description']);
        $stmt->bindValue(":img", $data['img']);
        $stmt->bindValue(":alt", $data['alt']);
        $stmt->bindValue(":slug", $data['slug']);
        $stmt->bindValue(":navtitle", $data['nav-title']);
        $stmt->execute();
        $this->errorManagement($stmt);

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        // backup
        $sql = "INSERT INTO `page_sauvegarde`(`id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`)
  SELECT `id`, `h1`, `description`, `img`, `alt`, `slug`, `nav-title`, `default_page`
FROM `page` WHERE id = :id;";
        $stmt = DB::get()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->errorManagement($stmt);
        // delete
        $sql = "DELETE FROM 
  `page` 
WHERE 
  `id` = :id 
  AND `default_page` = 0
LIMIT 1
";
        $stmt = DB::get()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->errorManagement($stmt);
        return true;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        $sql = "SELECT count(*) as dracula FROM `page`";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute();
        $this->errorManagement($stmt);
        return $stmt->fetch(\PDO::FETCH_OBJ)->dracula;
    }

    /**
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function setDefault($id)
    {
        if (false === $data = $this->getById($id)) {
            throw new \Exception('Ooooops MORDUUUUUUU');
        }
        if ($data->default_page === 1) {
            throw new \Exception('Ooooops tatan elle fait des flans');
        }
        $sql = "UPDATE
  `page`
SET
  `default_page` = if( `id` = :id, 1, 0)
WHERE
  `default_page` = 1
  OR `id` = :id;";
        $stmt = DB::get()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->errorManagement($stmt);
        return true;
    }
}
