<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Paper;

class RecentPaper extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $papers = Paper::latest()->limit(3)->get();
        return view('components.recent-paper', [
            'papers' => $papers
        ]);
    }
}
