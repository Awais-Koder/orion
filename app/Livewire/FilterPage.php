<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Solution;
use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\PropertyGroup;
use App\Models\Property;

class FilterPage extends Component
{
    public $brands;
    public $showAllBrands = false;
    public $wallHeight = [1500, 2400];
    public $solutions;
    public $visibleSolutionCount = 9;
    #[Url]
    public ?string $markerTypeId = null;
    #[Url]
    public ?string $categoryId = null;
    #[Url(as: 'filters')]
    public array $filters = [];
    public $propertyGroups = [];
    public $ungroupedProperties = [];

    public $decodedMarkerTypeId;
    public $decodedCategoryId;


    public function getVisibleBrandsProperty()
    {
        return $this->showAllBrands ? $this->brands : $this->brands->take(3);
    }

    public function mount()
    {
        $this->decodedMarkerTypeId = $this->markerTypeId ? base64_decode($this->markerTypeId) : null;
        $this->decodedCategoryId = $this->categoryId ? base64_decode($this->categoryId) : null;
        if ($this->decodedMarkerTypeId && $this->decodedCategoryId) {
            $this->solutions = Solution::where([
                'marker_type_id' => $this->decodedMarkerTypeId,
                'marker_type_category_id' => $this->decodedCategoryId,
            ])->get();
        } else {
            $this->solutions = Solution::all();
        }

        $this->brands = Brand::withCount('products')->get();
        // $this->loadProperties();
        dd($this->loadProperties());
    }
    // to load properties for selected ids
    public function loadProperties()
    {
        $markerTypeId = $this->decodedMarkerTypeId;
        $categoryId = $this->decodedCategoryId;
        // Fetch grouped properties
        $this->propertyGroups = PropertyGroup::with(['properties' => function ($query) use ($markerTypeId, $categoryId) {
            $query->where(['marker_type_id' => $markerTypeId, 'is_filterable' => true])
                ->when($categoryId, function ($q) use ($categoryId) {
                    $q->where('marker_type_category_id', $categoryId);
                })
                ->orderBy('sequence');
        }])->get();
    }
    public function render()
    {
        return view('livewire.filter-page')->layout('default', [
            'title' => 'Filters',
        ]);
    }
}
