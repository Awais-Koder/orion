<?php

namespace App\Livewire;

use App\Models\MarkerType;
use Livewire\Component;
use Livewire\WithPagination;

class Markertypes extends Component
{
    public $selectedMarkerTypeId = null;
    public $selectedCategoryId = null;
    

    public function selectMarkerType($markerTypeId)
    {
        $this->selectedMarkerTypeId = $markerTypeId;
        $this->selectedCategoryId = null;
        $markerType = \App\Models\MarkerType::with('markerTypeCategories')->find($markerTypeId);

        if ($markerType && $markerType->markerTypeCategories->isEmpty()) {
            return $this->redirect('/filters/' . base64_encode($markerTypeId), navigate: true);
        }
    }

    public function selectCategory($selectedCategoryId)
    {
        $this->selectedCategoryId = $selectedCategoryId;

        // Redirect to filters page with both marker type ID and category ID
        return $this->redirect('/filters/' . base64_encode($this->selectedMarkerTypeId) . '/' . base64_encode($selectedCategoryId), navigate: true);
    }

    public function render()
    {
        $markerTypes = MarkerType::with('markerTypeCategories')->get();
        return view('livewire.markertypes', [
            'markerTypes' => $markerTypes,
        ])->layout('default', [
            'title' => 'Marker Types',
        ]);
    }
}
