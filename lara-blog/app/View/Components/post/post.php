<?php

namespace App\View\Components\post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class post
 * @package App\View\Components\post
 */
class post extends Component
{
    /**
     * @var $post
     * @var $type
     * @var $content
     */
    public $post;
    public $type;
    public $content;

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
        $this->content = preg_replace('/(<([^>]+)>)/', '', $this->post->content);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.post.post');
    }
}
