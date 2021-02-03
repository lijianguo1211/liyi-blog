<?php
/**
 * Notes:
 * File name:PostService
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 15:58
 */


namespace App\Service;


use App\Exceptions\CreateDataException;
use App\Models\Post;
use App\Models\PostDetail;

class PostService extends AbstractService
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * @var PostDetail
     */
    protected $postDetail;

    public function register()
    {
        $this->post = new Post();

        $this->postDetail = new PostDetail();
    }

    /**
     * @Notes:
     *
     * @param array $post
     * @param array $postDetail
     * @return bool
     * @throws \Throwable
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 16:53
     */
    public function create(array $post, array $postDetail)
    {
        try {
            \DB::transaction(function () use ($post, $postDetail) {
                $postModel = $this->post->create($post);

                $id = $postModel->id;

                $postDetail['post_id'] = $id;
                $this->postDetail->create($postDetail);
            }, 2);
            $result = true;
        } catch (\Exception $e) {
            new CreateDataException(fileLocal($this, $e, __FUNCTION__));
            $result = false;
        }

        return $result;
    }
}
