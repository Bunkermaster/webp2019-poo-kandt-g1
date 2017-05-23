<?php

namespace Yann\Model;

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
        ...";
        return [];
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
        return $this->getAll($slug);
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->getAll(null, $id);
    }

    /**
     * @return array
     */
    public function getDefault()
    {
        return $this->getAll(null, null, true);
    }

    /**
     *
     */
    public function update()
    {

    }

    /**
     *
     */
    public function add()
    {

    }

    /**
     *
     */
    public function delete()
    {

    }
}