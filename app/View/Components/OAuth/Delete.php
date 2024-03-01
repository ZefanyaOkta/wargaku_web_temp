<?php

namespace App\View\Components\OAuth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Laravel\Passport\Client;

class Delete extends Component
{
    public $modalId,  $title, $client;
    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $rowId)
    {
        $this->modalId = $modalId;
        $this->title = $title;

        $data = Client::find($rowId);

        $this->client = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.o-auth.delete');
    }
}
