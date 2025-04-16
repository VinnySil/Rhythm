<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MusicCard extends Component
{

    public $musicSource;
    public $imageCover;
    public $title;
    public $artist;

    /**
     * Create a new component instance.
     */
    public function __construct($musicSource, $title = 'Untitled Track', $artist = 'Unknown', $imageCover = 'default_cover.webp')
    {
        $this->musicSource = $musicSource;
        $this->imageCover = $imageCover;
        $this->title = $title;
        $this->artist = $artist;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music-card');
    }
}
