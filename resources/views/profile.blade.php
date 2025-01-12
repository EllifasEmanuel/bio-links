<x-layout.app>
    <x-container>
        <x-card title="Profile">
            <x-form :route="route('profile')" put id="form" enctype="multipart/form-data">
                <div class="flex gap-2 items-center">
                    <x-img src="{{asset('storage/' . $user->photo)}}" alt="Profile Picture" />
                    <x-file-input name="photo" id="photo" />
                </div>
                <x-input name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}" />
                <x-textarea name="description" id="description" value="{{ old('description', $user->description) }}" />
                <x-input name="handler" prefix="biolinks.com.br/" id="handler" placeholder="Handler" value="{{ old('handler', $user->handler) }}" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Register</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
