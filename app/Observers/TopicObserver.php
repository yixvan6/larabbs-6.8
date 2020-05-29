<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // 过滤文章内容，防止 xss 注入
        $topic->body = clean($topic->body, 'user_topic_body');

        $topic->excerpt = make_excerpt($topic->body);
    }

    public function updating(Topic $topic)
    {
        //
    }
}