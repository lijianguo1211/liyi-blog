<?php

namespace App\Console\Commands;

use App\Models\PostDetail;
use App\Service\PostService;
use App\Service\PostTagService;
use App\Service\TagService;
use Illuminate\Console\Command;

class SyncPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '转移数据库数据用于测试';

    /**
     * @var PostService
     */
    protected $postService;

    /**
     * @var TagService
     */
    protected $tagService;

    protected $postTagService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->postService = new PostService();

        $this->tagService = new TagService();

        $this->postTagService = new PostTagService();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$this->syncPost();

//        $this->syncTag();

        $this->syncPostTag();
        return 0;
    }

    /**
     * @Notes: 同步文章
     *
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 18:30
     */
    protected function syncPost()
    {
        $pinYin = app('pinyin');
        try {
            \DB::connection('test')->table('jay_blogs')
                ->join('jay_blog_details as bd', 'jay_blogs.id', '=', 'bd.blog_id')
                ->select('jay_blogs.*', 'bd.content_html', 'bd.content_md')
                ->orderBy('id')
                ->chunk(10, function ($details) use ($pinYin) {
                    foreach ($details as $detail) {
                        $post = [
                            'post_url' => $pinYin->permalink($detail->title),
                            'post_type' => 1
                        ];

                        $postDetail = [
                            'post_title' => $detail->title,
                            'post_key_word' => $detail->key_word,
                            'post_status' => $detail->post_status,
                            'is_top' => $detail->is_top,
                            'source' => $detail->source,
                            'post_excerpt' => mb_substr(strip_tags($detail->content_html), 0, 255),
                            'post_content' => $detail->content_md,
                            'post_date' => $detail->created_at,
                        ];

                        $this->postService->create($post, $postDetail);
                    }
                });
        } catch (\Exception $e) {
            $this->info(PHP_EOL);
            $this->error($e->getMessage());
            $this->info(PHP_EOL);
        }
    }

    /**
     * @Notes: 同步标签
     *
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 18:30
     */
    protected function syncTag()
    {
        $data = \DB::connection('test')->table('jay_tags')->orderBy('id')->get();

        foreach ($data as $key => $item) {
            if ($item->parent === 0) {
                $data = [
                    'tag_name' => $item->tag_name,
                    'tag_url' => $item->tag_slug,
                    'tag_sort' => $key,
                    'tag_type' => 1,
                    'tag_status' => 1
                ];
            } else {
                $data = [
                    'tag_name' => $item->tag_name,
                    'tag_url' => $item->tag_slug,
                    'tag_sort' => $key,
                    'tag_parent' => '-0-' . $item->parent,
                    'tag_type' => 1,
                    'tag_status' => 1
                ];
            }

            $this->tagService->create($data);
        }
    }

    /**
     * @Notes: 同步文章和标签的关联关系
     *
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 18:43
     */
    protected function syncPostTag()
    {
        \DB::connection('test')->table('jay_blog_tag_categories')
            ->where('type', 1)
            ->orderBy('id')
            ->chunk(10, function ($details) {
                foreach ($details as $detail) {
                    $title = \DB::connection('test')->table('jay_blogs')
                        ->where('id', $detail->blog_id)
                        ->value('title');
                    if (!$title) {
                        $this->info('文章id不存在[ ' . $detail->blog_id . ' ]');
                        continue;
                    }

                    if (!PostDetail::where('post_title', $title)->exists()) {
                        $this->info("当前数据库不存在文章 [" . $title . ' ]');
                        continue;
                    }

                    $id = PostDetail::where('post_title', $title)->value('post_id');

                    $data = [
                        'resources_id' => $id,
                        'tag_id' => $detail->term_id,
                    ];

                    $this->postTagService->create($data);
                }
        });
    }
}
