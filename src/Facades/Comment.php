<?php

namespace Treefung\Comment\Facades;

use Illuminate\Support\Facades\Facade;

class Comment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Treefung\Comment\Comment::class;
    }
}
