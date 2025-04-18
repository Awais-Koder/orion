@switch($property->type_string)
    @case('number')
        <input type="number" wire:model="filters.{{ $property->id }}">
        @break

    @case('text')
        <select wire:model="filters.{{ $property->id }}">
            <option value="">Select</option>
            @foreach($property->propertyValues as $value)
                <option value="{{ $value->value }}">{{ $value->value }}</option>
            @endforeach
        </select>
        @break

    @case('choice')
        @foreach($property->propertyValues as $property)
            <div class="flex items-center cursor-pointer mb-1">
                <label>
                    <input type="checkbox" value="{{ $property->id }}" wire:model="filters.{{ $property->id }}">
                    {{ $property->propertyChoice->name }}
                    @if($property->propertyChoice->explanation)
                        <span title="{{ $property->propertyChoice->explanation }}">🛈</span>
                    @endif
                </label>
            </div>
        @endforeach
        @break

    @case('option')
        <select wire:model="filters.{{ $property->id }}">
            <option value="">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            <option value="n/a">N/A</option>
        </select>
        @break

    @case('slider')
        <label class="block text-sm font-medium text-gray-700">{{ $property->name }} ({{ $property->unit }})</label>
        <div class="flex items-center cursor-pointer mb-1">
            <input type="range" value="{{ $property->value }}"
                wire:model="filters.{{ $property->property_id }}" class="w-full">
        </div>
        @break

@endswitch
