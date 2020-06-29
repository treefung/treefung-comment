<?php

Route::namespace('\Treefung\Comment\Controllers')->prefix('comment')->group(function () {
    Route::any('/list','CarouselController@listAction');

});
