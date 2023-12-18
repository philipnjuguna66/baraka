<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AllServices extends Component
{
    use WithPagination;

    public int $take = 0;

    public function render() : View
    {
        $projects = Service::query()->with('sections');

        if ($this->take > 0)
        {
            $projects =  $projects->take($this->take);
        }
            $projects =  $projects->paginate();

        return view('livewire.service.all-services')->with([
            'projects' => $projects
        ]);
    }
}
