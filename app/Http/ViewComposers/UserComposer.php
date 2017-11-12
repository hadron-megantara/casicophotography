<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    public $admin = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->admin = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('admin', $this->admin);
    }
}