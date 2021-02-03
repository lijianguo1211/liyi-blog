<?php
/**
 * Notes:
 * File name:PostTagService
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 18:38
 */


namespace App\Service;


use App\Exceptions\CreateDataException;
use App\Models\PostTag;

class PostTagService extends AbstractService
{
    /**
     * @var PostTag
     */
    protected $postTag;

    public function register()
    {
        $this->postTag = new PostTag();
    }

    /**
     * @Notes: 文章与标签的关联关系添加
     *
     * @param array $postTags
     * @return bool
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 18:45
     */
    public function create(array $postTags)
    {
        try {
            $this->postTag->create($postTags);
            $result = true;
        } catch (\Exception $e) {
            new CreateDataException(fileLocal($this, $e, __FUNCTION__));
            $result = false;
        }

        return $result;
    }
}
