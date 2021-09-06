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
    public $link;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $content
     * @param $created
     * @param $link
     */
    public function __construct($title, $content, $created, $link)
    {
        $this->title = $title;
        $this->content = $content;
        $this->created = $created;
        $this->link = $link;
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
            ->with('created', $this->created)
            ->with('link', $this->link);
    }
}
