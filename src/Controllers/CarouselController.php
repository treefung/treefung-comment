<?php

namespace Treefung\Carousel\Controllers;

use Illuminate\Support\Facades\Request;
use Treefung\Carousel\Models\Carousel;
use Treefung\Carousel\Models\CarouselCategory;

class CarouselController extends BaseController {

    public function listAction() {

        $slug = Request::input('slug');

        $category = CarouselCategory::query()->where('slug', $slug)->first();

        $list = Carousel::query()->where('categoryId', $category->id)->orderBy('order', 'asc')->get();

        return $this->success($list);
    }

}
