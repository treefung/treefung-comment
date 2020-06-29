<?php

Route::namespace('\Treefung\Comment\Controllers')->prefix('comment')->group(function () {

    # 创建评论
    Route::any('/create','CommentController@createAction');

    # 拉取评论
    Route::any('/list','CommentController@listAction');

    # 拉取子评论
    Route::any('/subList','CommentController@subListAction');
});
