<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use App\Models\Solution;
use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\PropertyGroup;
use App\Models\Property;
use App\Services\MarkerTypeService;

class FilterPage extends Component
{
    public $filterdData;
    public $brands;
    public $showAllBrands = false;
    public $wallHeight = [1500, 2400];
    public $solutions;
    #[Url]
    public ?string $markerTypeId = null;
    #[Url]
    public ?string $categoryId = null;

    public $decodedMarkerTypeId;
    public $decodedCategoryId;


    public function getVisibleBrandsProperty()
    {
        return $this->showAllBrands ? $this->brands : $this->brands->take(3);
    }

    public function mount()
    {
        $this->filterdData = app(MarkerTypeService::class)->getPropertyGroupsWithFilters(
            base64_decode($this->markerTypeId ?? ''), 
            base64_decode($this->categoryId ?? '')
        );
        // uncomment to see in debug mode
        // dd($this->filterdData); 
        $this->brands = Brand::all();
    }
    public function render()
    {
        return view('livewire.filter-page')->layout('default', [
            'title' => 'Filters',
        ]);
    }
}
