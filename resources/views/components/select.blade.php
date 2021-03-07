@props(['options', 'value', 'disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach ($options as $key => $val)
        @if($key === $value)
            <option selected value = "{{ $key }}">{{ $val }}</option>
        @else
            <option value = "{{ $key }}">{{ $val }}</option>
        @endif
    @endforeach
</select>

