@props(['disabled' => false])

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}> --}}

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control_gray']) !!}> --}}

<div class="form-floating mb-3">
    <input {{ $disabled ? 'disabled' : '' }} id="{{ $name = '' }}" {!! $attributes->merge(['class' => 'form-control form-control_gray','label'=>'']) !!}>
    <label > {{ $attributes['label'] }} </label>
</div>
