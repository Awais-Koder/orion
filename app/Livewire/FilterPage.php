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
    public $filteredData;
    public $brands;
    public $visibleBrandCount = 3;
    public $visibleChoicesCount = 3;
    public $showAllBrands = false;
    public $solutions;
    #[Url]
    public ?string $markerTypeId = null;
    #[Url]
    public ?string $categoryId = null;


    // to show more brands
    public function getVisibleBrandsProperty()
    {
        return $this->brands->take($this->visibleBrandCount);
    }
    public function showMoreBrands()
    {
        $this->visibleBrandCount += 5;
    }
    // end logic for show more brands
    // to show more choices
    public function getVisibleChoicesProperty()
    {
        return $this->filteredData->take($this->visibleChoicesCount);
    }
    public function showMoreChoices()
    {
        $this->visibleChoicesCount += 5;
    }

    public function mount()
    {
        $this->filteredData = app(MarkerTypeService::class)->getPropertyGroupsWithFilters(
            (int) base64_decode($this->markerTypeId ?? ''),
            $this->categoryId ? (int) base64_decode($this->categoryId) : null
        );
        // working pedning
        $this->brands = Brand::all();
    }
    public function render()
    {
        return view('livewire.filter-page')->layout('default', [
            'title' => 'Filters',
        ]);
    }
}
