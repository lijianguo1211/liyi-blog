<?php
/**
 * Notes:
 * File name:TagService
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 18:15
 */


namespace App\Service;


use App\Exceptions\CreateDataException;
use App\Models\Tag;

class TagService extends AbstractService
{
    /**
     * @var Tag
     */
    protected $tag;

    public function register()
    {
        $this->tag = new Tag();
    }

    /**
     * @Notes:
     *
     * @param array $tags
     * @return bool
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 18:23
     */
    public function create(array $tags)
    {
        try {
            $this->tag->create($tags);
            $result = true;
        } catch (\Exception $e) {
            new CreateDataException(fileLocal($this, $e, __FUNCTION__));
            $result = false;
        }

        return $result;
    }
}
