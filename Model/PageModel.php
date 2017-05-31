<?php

namespace Bunkermaster\Model;

use Bunkermaster\Helper\DB;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Model
 */
class PageModel
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
        if($stmt->errorCode() !== '00000'){
            die('wtf dude! '.$stmt->errorInfo()[2]);
        }

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
    public function update()
    {

    }

    /**
     * @param $data
     * @return bool
     */
    public function add($data)
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
        if ($stmt->errorCode() !== '00000') {
            throw new \PDOException(__METHOD__.' marche pas!');
        }
        return true;
    }

    /**
     *
     */
    public function delete()
    {

    }
}