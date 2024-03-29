<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;
use Illuminate\View\View;

/**
 * "Modal" component
 */
class Modal extends Component
{
    public string $name = 'dd-modal';

    public int $timeoutDuration = 25200; // 3600 * 7 (in seconds)

    public bool $show = false;

    public function __construct(
        string $buttonHref,
        string $buttonText,
        string $title,
        string $description,
        string $cookie
    ) {
        $this->buttonHref = $buttonHref;
        $this->buttonText = $buttonText;
        $this->title = $title;
        $this->description = $description;
        $this->name = $cookie;
        $this->show = ! is_page('covid-resources') && $this->shouldShow();
    }

    public function render(): View
    {
        return $this->view('components.modal', [
            'buttonHref' => $this->buttonHref,
            'buttonText' => $this->buttonText,
            'description' => $this->description,
            'title' => $this->title,
            'show' => $this->show,
        ]);
    }

    public function shouldShow(): bool
    {
        if (
            array_key_exists($this->name, $_COOKIE) 
            && $_COOKIE[$this->name] === 'true'
        ) {
            return false;
        }

        return true;
    }
}
