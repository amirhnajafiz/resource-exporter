<?php

namespace App\View\Components\post\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewHeader extends Component
{
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
        return view('components.post.header.view-header');
    }
}
