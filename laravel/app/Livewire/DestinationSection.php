<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Destination;

class DestinationSection extends Component
{
    public $name_destination;
    public $category;

    public function render()
    {
        // Mulai query dasar
        $query = Destination::query();

        // Tambahkan kondisi jika $name_destination ada
        if (!empty($this->name_destination)) {
            $query->where('Name_Destination', 'like', '%' . $this->name_destination . '%');
        }

        // Tambahkan kondisi jika $category ada
        if (!empty($this->category)) {
            $query->where('Category', 'like', '%' . $this->category . '%');
        }

        // Ambil hasil query
        $destinations = $query->get();

        return view('livewire.destination-section', [
            'Destination' => $destinations,
        ]);
    }
}
