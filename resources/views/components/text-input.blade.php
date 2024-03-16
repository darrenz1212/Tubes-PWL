@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 bg-soft-green text-card-green focus:ring-white rounded-md shadow-sm']) !!}>
