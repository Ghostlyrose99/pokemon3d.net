<x-jet-form-section submit="save">
    <x-slot name="title">
        <img src="{{ asset('img/gamejolt-logo-light-1x.png') }}" class="inline-block">
    </x-slot>

    <x-slot name="description">
        <span class="inline-block">{{ __('Link your account with GameJolt to be able to edit your skins for in-game use, and more features to come.') }}</span>
        <span class="inline-block mt-1">{{ __('Last Updated:') }} {{ $gamejolt_updated_at }} &middot; {{ __('Last Verified:') }} {{ $gamejolt_verified_at }}</span>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gamejolt_username" value="{{ __('Username') }}" />
            <x-jet-input id="gamejolt_username" type="text" class="mt-1 block w-full" wire:model="gamejolt_username" />
            <x-jet-input-error for="gamejolt_username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gamejolt_token" value="{{ __('Token') }}" />
            <x-jet-input id="gamejolt_token" type="password" class="mt-1 block w-full" wire:model="gamejolt_token" />
            <x-jet-input-error for="gamejolt_token" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-green-500" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        @error('error')
            <span class="mr-3 text-red-500">{{ $message }}</span>
        @enderror

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
