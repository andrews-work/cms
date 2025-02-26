<div class="p-">
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-200 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-center max-w-screen-xl gap-8 mx-auto ">

        <!-- email -->
        <livewire:forms.profile.update-email />

        <!-- password -->
        <livewire:forms.profile.update-password />

        <!-- city -->
        <livewire:forms.profile.update-city />

        <!-- name -->
        <livewire:forms.profile.update-name />

    </div>
</div>
