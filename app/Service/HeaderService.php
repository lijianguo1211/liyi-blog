<?php
/**
 * Notes:
 * File name:HeaderService
 * Create by: Jay.Li
 * Created on: 2021/1/26 0026 17:19
 */


namespace App\Service;

use App\Models\Header;

class HeaderService extends AbstractService
{
    /**
     * @var Header
     */
    protected $header;

    public function register()
    {
        $this->header = new Header();
    }

    /**
     * @Notes: 得到数据
     *
     * @return array|mixed
     * @auther: Jay
     * @Date: 2021/1/26 0026
     * @Time: 18:12
     */
    public function getList()
    {
        return \Cache::tags(config('cache.cacheManage.header.tag'))
            ->remember(
                config('cache.cacheManage.header.key'),
                config('cache.cacheManage.header.ttl'),
                function () {
            return $this->header->newQuery()
                ->where('header_status', 1)
                ->orderBy('header_order')
                ->get()->toArray();
        });
    }

    public function store()
    {
        $this->header->create([
            'header_name' => '首页',
            'header_url' => 'home',
            'parent_path' => '-0',
            'header_order' => 1,
            'header_status' => 1,
        ]);
        $this->header->create([
            'header_name' => '博客',
            'header_url' => 'blog',
            'parent_path' => '-0',
            'header_order' => 2,
            'header_status' => 1,
        ]);
        $this->header->create([
            'header_name' => '新闻',
            'header_url' => 'news',
            'parent_path' => '-0',
            'header_order' => 3,
            'header_status' => 1,
        ]);
        $this->header->create([
            'header_name' => '图片分享',
            'header_url' => 'images',
            'parent_path' => '-0',
            'header_order' => 4,
            'header_status' => 1,
        ]);
        $this->header->create([
            'header_name' => '问题分享',
            'header_url' => 'message',
            'parent_path' => '-0',
            'header_order' => 5,
            'header_status' => 1,
        ]);
        $this->header->create([
            'header_name' => '测试',
            'header_url' => 'test',
            'parent_path' => '-0',
            'header_order' => 6,
            'header_status' => 1,
        ]);
    }
}
