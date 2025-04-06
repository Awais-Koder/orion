<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Country;
use App\Models\Enums\PropertyTypeEnum;
use App\Models\EtaReport;
use App\Models\Manufacturer;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyChoice;
use App\Models\PropertyGroup;
use App\Models\PropertyValue;
use App\Models\Region;
use App\Models\Solution;
use App\Models\SolutionVersion;
use App\Models\SolutionVersionDocument;
use App\Models\SolutionVersionPhoto;
use App\Models\User;
use Database\Factories\ProductFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedUsers();
        $this->seedWorld();
        $this->seedMarkers();
        $this->seedOrganisations();
        $this->seedProperties();
        $this->seedCatalog();
    }

    protected function seedUsers(): void
    {
        User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'info@orion.com',
        ]);
    }

    protected function seedWorld(): void
    {
        Region::factory(3)
            ->sequence(
                ['name' => 'Europe'],
                ['name' => 'Asia'],
                ['name' => 'North America']
            )
            ->create();

        Country::factory(5)
            ->for(Region::firstWhere('name->en', 'Europe'))
            ->sequence(
                ['name' => 'The Netherlands', 'code_iso3166_2' => 'NL'],
                ['name' => 'Belgium', 'code_iso3166_2' => 'BE'],
                ['name' => 'Germany', 'code_iso3166_2' => 'DE'],
                ['name' => 'France', 'code_iso3166_2' => 'FR'],
                ['name' => 'United Kingdom', 'code_iso3166_2' => 'GB'],
            )
            ->create();
    }

    protected function seedOrganisations(): void
    {
        Company::factory(3)
            ->has(User::factory(3)
                ->forCompany()
                ->recycle(Country::all()))
            ->create();
    }

    protected function seedMarkers(): void
    {
        MarkerType::factory()
            ->sequencedName(true)
            ->create();

        $markerTypeCategories = MarkerTypeCategory::factory()
            ->for(MarkerType::firstWhere('name->en', 'Penetration'))
            ->sequencedName()
            ->count(6)
            ->create();

        MarkerTypeCategory::factory()
            ->sequencedName()
            ->forLevel(1, $markerTypeCategories[0])
            ->count(4)
            ->create();
    }

    protected function seedProperties(): void
    {
        // Seed properties on marker type -level, so we can test inheritance.
        $properties = Property::factory(2)
            ->for($penetrationMarkerType = MarkerType::firstWhere('name->en', 'Penetration'))
            ->sequence(
                ['name' => 'Introduction year', 'type' => PropertyTypeEnum::Number, 'is_filterable' => false, 'unit' => null],
                ['name' => 'Fire resistance', 'type' => PropertyTypeEnum::Choice, 'is_filterable' => true, 'unit' => null],
            )
            ->inReverseSequence()
            ->create([
                'marker_type_category_id' => null,
            ]);

        PropertyChoice::factory(10)
            ->for($properties->firstWhere('name', 'Fire resistance'))
            ->sequencedName()
            ->inReverseSequence()
            ->create();

        $markerTypeCategory1 = $penetrationMarkerType->markerTypeCategories()->firstWhere('name->en', 'MarkerTypeCategory 1 level 1');

        // Seed property group.
        $propertyGroup = PropertyGroup::factory()
            ->for($penetrationMarkerType)
            ->for($markerTypeCategory1)
            ->recycle($penetrationMarkerType)
            ->has(Property::factory(3)
                ->sequence(
                    ['name' => 'Sub C', 'type' => PropertyTypeEnum::Choice, 'is_filterable' => true],
                    ['name' => 'Sub B', 'type' => PropertyTypeEnum::Slider, 'is_filterable' => true],
                    ['name' => 'Sub A', 'type' => PropertyTypeEnum::Number, 'is_filterable' => false]
                )
                ->inReverseSequence()
                ->for($markerTypeCategory1))
            ->create([
                'marker_type_category_id' => null,
            ]);

        PropertyChoice::factory(10)
            ->for($propertyGroup->properties()->firstWhere('name->en', 'Sub C'))
            ->sequencedName()
            ->create();

        // Seed properties on lower category -level, so we can test inheritance.
        $properties = Property::factory(5)
            ->for($penetrationMarkerType)
            ->for($markerTypeCategory1)
            ->sequence(
                ['name' => 'Remountable', 'type' => PropertyTypeEnum::Option, 'is_filterable' => true, 'unit' => null],
                ['name' => 'Qualification', 'type' => PropertyTypeEnum::Text, 'is_filterable' => true, 'unit' => null],
                ['name' => 'Gaps', 'type' => PropertyTypeEnum::Number, 'is_filterable' => true, 'unit' => null],
                ['name' => 'Wall height', 'type' => PropertyTypeEnum::Slider, 'is_filterable' => true, 'unit' => 'cm'],
                ['name' => 'Grade', 'type' => PropertyTypeEnum::Choice, 'is_filterable' => true],
            )
            ->create();

        PropertyChoice::factory(10)
            ->for($properties->firstWhere('name', 'Grade'))
            ->sequencedName()
            ->create();
    }

    protected function seedCatalog(): void
    {
        Manufacturer::factory(3)
            ->has(User::factory(3)
                ->forManufacturer()
                ->recycle(Country::all()))
            ->has(EtaReport::factory(3))
            ->has(Brand::factory(2)
                ->has(Product::factory(6)
                    ->sequencedName())
                ->has(Solution::factory(8)
                    ->sequencedName()
                    ->has(SolutionVersion::factory(2)
                        ->sequencedVersionCode()
                        ->recycle(MarkerType::all())
                        ->for($penetrationMarkerType = MarkerType::firstWhere('name->en', 'Penetration'))
                        ->for($penetrationMarkerType->markerTypeCategories()->firstWhere('name->en', 'MarkerTypeCategory 1 level 1'))
                        ->has(SolutionVersionDocument::factory(2)
                            ->inSequence())
                        ->has(SolutionVersionPhoto::factory(6)
                            ->inSequence())
                        //->has(PropertyValue::factory(1))
                        ->state(fn() => [
                            'eta_report_id' => fn(array $attributes) => Solution::findOrFail($attributes['solution_id'])->brand->manufacturer->etaReports->random()->id,
                        ])
                        ->afterCreating(fn(SolutionVersion $solutionVersion) => $solutionVersion->solutionVersionProducts()->attach($solutionVersion->solution->brand->products->random(2)->pluck('id')))
                        ->afterCreating(fn(SolutionVersion $solutionVersion) => $this->seedPropertyValues($solutionVersion))
                    ))
            )
            ->create();
    }

    private function seedPropertyValues(SolutionVersion $solutionVersion): void
    {
        $properties = $solutionVersion->markerType->properties
            ->where('is_filterable', true)
            ->keyBy('name');

        foreach($properties as $property)
            PropertyValue::factory()
                ->for($solutionVersion)
                ->for($property)
                ->relatedValue()
                ->create();
    }
}
