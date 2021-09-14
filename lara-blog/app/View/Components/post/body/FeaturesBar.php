<?php

namespace App\View\Components\post\body;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class FeaturesBar
 * @package App\View\Components\post\body
 */
class FeaturesBar extends Component
{
    /**
     * @var $post
     * @var $type
     */
    public $post;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $post
     */
    public function __construct($type, $post)
    {
        $this->post = $post;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.post.body.features-bar');
    }
}
