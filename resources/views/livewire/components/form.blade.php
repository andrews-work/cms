<div class="mb-4">
    <!-- Label -->
    <label for="{{ $name }}" class="block text-sm font-medium text-secondary dark:text-primary">
        {{ $label }}
    </label>

    <!-- Input -->
    <input
        type="{{ $type ?? 'text' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($model) wire:model="{{ $model }}" @endif
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        class="mt-1 block px-3 py-2 border rounded-md shadow-sm
            bg-primary text-secondary border-secondary
            focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary
            dark:bg-secondary dark:text-primary dark:border-primary dark:focus:ring-primary dark:focus:border-primary"
    >

    <!-- Error Message -->
    @if($error)
        <span class="text-red-500 text-sm">{{ $error }}</span>
    @endif
</div>
