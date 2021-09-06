<?php

namespace App\View\Components\post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class post extends Component
{
    public $title;
    public $content;
    public $created;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $content
     * @param $created
     */
    public function __construct($title, $content, $created)
    {
        $this->title = $title;
        $this->content = $content;
        $this->created = $created;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.post.post')
            ->with('title', $this->title)
            ->with('content', $this->content)
            ->with('created', $this->created);
    }
}
