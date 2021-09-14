<?php

namespace App\View\Components\post\body;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Tags
 * @package App\View\Components\post\body
 */
class Tags extends Component
{
    /**
     * @var $post
     */
    public $post;

    /**
     * Create a new component instance.
     *
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.post.body.tags');
    }
}
