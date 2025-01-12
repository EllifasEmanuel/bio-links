<x-layout.app>
    <x-container>
        <x-card title="Create a new link">
            <x-form :route="route('links.create')" post id="form">
                <x-input type="link" name="link" id="link" placeholder="Link" value="{{ old('link') }}" />
                <x-input type="name" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Create a new link</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
