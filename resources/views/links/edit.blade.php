<x-layout.app>
    <x-container>
        <x-card title="Editing link :: id {{$link->id}}">
            <x-form :route="route('links.edit', $link)" put id="form">
                <x-input type="link" name="link" id="link" placeholder="Link" value="{{ old('link', $link->link) }}" />
                <x-input type="name" name="name" id="name" placeholder="Name" value="{{ old('name', $link->name) }}" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Update link</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
