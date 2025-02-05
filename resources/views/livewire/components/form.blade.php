<div class="mb-4">

    <!-- label -->
    <label for="{{ $name }}" class="block text-sm font-medium text-secondary dark:text-primary">
        {{ $label }}
    </label>

    <!-- input -->
    <input
        type="{{ $type ?? 'text' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($model) wire:model="{{ $model }}" @endif
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-secondary dark:text-primary dark:border-primary dark:focus:ring-primary dark:focus:border-primary"
    >

    <!-- error -->
    @if($error)
        <span class="text-sm text-red-500">{{ $error }}</span>
    @endif
</div>
