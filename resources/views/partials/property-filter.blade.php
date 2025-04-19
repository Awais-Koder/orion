@switch($property->type_string)
@case('number')
<div class="m-4">
    <label class="block text-sm font-medium text-gray-700 my-2">{{ $property->name }} {{
        formatUnit($property->unit)}}</label>
    <select id="countries"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Select</option>
        @foreach($property->propertyValues as $value)
        <option value="{{ $value->value }}">{{ $value->value }}</option>
        @endforeach
    </select>
</div>
@break

@case('text')
<div class="m-4">
<label class="block text-sm font-medium text-gray-700 my-2">{{ $property->name }} {{
    formatUnit($property->unit)}}</label>
<select id="countries"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    <option selected>Select</option>
    @foreach($property->propertyValues as $value)
    <option value="{{ $value->value }}">{{ $value->value }}</option>
    @endforeach
</select>
</div>
@break

@case('choice')
<div class="m-4">
<label class="block text-sm font-medium text-gray-700 my-2">{{ $property->name }} {{ formatUnit($property->unit) }}
</label>
@foreach($property->propertyValues as $property)
<div class="flex items-center mb-4">
    <input id="{{ $property->id }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 bg-white">
    <label for="{{ $property->id }}" class="ms-2 text-sm font-medium text-gray-900">{{ $property->value }}</label>
</div>
@endforeach
<div class="mb-4 m-4">
    <button class="text-gray-800 cursor-pointer" wire:clic="showMoreChoices">Show more</button>
</div>
</div>
@break

@case('option')
<div class="m-4">
<label class="block text-sm font-medium text-gray-700 my-2">{{ $property->name }} {{ formatUnit($property->unit) }}
</label>
<select id="countries"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    <option value="">Select</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
    <option value="n/a">N/A</option>
</select>
</div>
@break

@case('slider')
<div class="m-4">
<div class="max-w-md mx-auto">
    <label class="block text-sm font-medium text-gray-700 my-2">{{ $property->name }} {{ formatUnit($property->unit)
        }}</label>

    <div id="rangeSlider" class="m-4"></div>

    <div class="flex justify-between text-sm text-gray-600">
        <span>Min: <span id="min-val" class="font-semibold">0</span></span>
        <span>Max: <span id="max-val" class="font-semibold">1000</span></span>
    </div>
</div>
</div>
@break
@endswitch