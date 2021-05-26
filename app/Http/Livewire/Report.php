<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Report extends Component
{
    public $report_type;
    public $fields;

    public function mount()
    {
        $this->fields = [
            'title', 'journal', 'conference', 'book', 'publication_date',
            'authors', 'publisher', 'volume', 'pages',
        ];
    }

    public function render()
    {
        return view('livewire.report', ['fields' => $this->fields,]);
    }
}
