<?php

namespace App\View\Components\post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class post extends Component
{
    public $title;
    public $content;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $content
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        $content = strlen($this->content) > 50 ? substr($this->content, 0 , 47) . ' ...' : $this->content;
        return view('components.post.post')
            ->with('title', $this->title)
            ->with('content', $content);
    }
}
