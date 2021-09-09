<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class PostCard extends Component
{
    public $post;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $post
     * @param $type
     */
    public function __construct($post, $type)
    {
        $this->post = $post;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post.post-card');
    }
}
