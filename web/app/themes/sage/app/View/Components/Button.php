<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

/**
 * Button component
 */
class Button extends Component
{
    /** @var string */
    public $url;

    /** @var string */
    public $role;

    /**
     * Create the component instance.
     *
     * @param  string  $url
     * @param  string  $label
     * @return void
     */
    public function __construct(
        $url = '#',
        $role = 'button'
    ) {
        $this->url = $url;
        $this->role = $role;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.button');
    }
}
