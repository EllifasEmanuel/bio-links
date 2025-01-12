<x-layout.app>
    <x-container>
        <div class="absolute top-10 left-10 flex flex-col gap-4">
            <x-button :href="route('profile')" ghost primary>Update Profile</x-button>
            <x-button :href="route('links.create')" ghost primary>Create a new link</x-button>
            <x-button :href="route('logout')" ghost primary>Logout</x-button>
        </div>
        <div class="text-center space-y-2 w-2/3">
            <x-img src="{{asset('storage/' . $user->photo)}}" alt="Profile Picture" />
            <div class="font-bold text-2x1 tracking-wider">{{$user->name}}</div>
            <div class="text-sm opacity-80">{{$user->description}}</div>

            <ul class="space-y-2">
                @foreach($links as $link)
                    <li class="flex items-center justify-center gap-2">
                        @unless($loop->first)
                            <x-form :route="route('links.up', $link)" patch>
                                <x-button ghost>
                                    <x-icons.arrow-up class="w-6 h-6" />
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled ghost>
                                <x-icons.arrow-up class="w-6 h-6" />
                            </x-button>
                        @endunless

                        <x-button href="{{route('links.edit', $link)}}" wide outline info>
                            {{$link->name}}
                        </x-button>

                        @unless($loop->last)
                            <x-form :route="route('links.down', $link)" patch>
                                <x-button ghost>
                                    <x-icons.arrow-down class="w-6 h-6" />
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled ghost>
                                <x-icons.arrow-down class="w-6 h-6" />
                            </x-button>
                        @endunless

                        <x-form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Tem certeza?')">
                            <x-button ghost>
                                <x-icons.trash class="w-6 h-6" />
                            </x-button>
                        </x-form>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>
</x-layout.app>
