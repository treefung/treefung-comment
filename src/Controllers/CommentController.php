<?php

namespace Treefung\Comment\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Treefung\Comment\Models\Comment;

class CommentController extends BaseController {

    public function listAction() {

        $slugId = Request::input('slugId');
        $page = Request::input('page');

        $comment = Comment::query()->where('slugId', $slugId)->whereNull('parentId')->orderBy('createTime', 'desc')->paginate(5);

        foreach ($comment as $item) {

            // 拉取子评论第一页 伪装成 laravel 分页
            $subComment = new \stdClass();
            $subComment->data = Comment::query()->where('parentId', $item->id)->orderBy('createTime', 'desc')->limit(5)->get();
            // $subComment->total = Comment::query()->where('parentId', $item->id)->count();
            foreach ($subComment->data as $list) {
                $list->user = User::userBaseInfo($list->userId);
            }

            $item->subComment = $subComment;
            $item->user = User::userBaseInfo($item->userId);
        }

        return $this->success($comment);
    }

    public function subListAction() {

        $parentId = Request::input('parentId');
        $page = Request::input('page');

        $comment = CourseComment::query()->where('parentId', $parentId)->orderBy('createTime', 'desc')->paginate(5);

        foreach ($comment as $item) {
            $item->user = User::userBaseInfo($item->userId);
        }

        return $this->success($comment);
    }

    public function createAction() {

        // $user = User::loginUser();

        $courseId = Request::input('courseId');
        $content = Request::input('content');
        $score = Request::input('score');
        $parentId = Request::input('parentId');


        $comment = new CourseComment([
            'courseId' => $courseId,
            'content' => $content,
            'score' => $score,
            'parentId'=> $parentId,
            'userId' => 1
        ]);

        $comment->save();

        return $this->success($comment);
    }


}
