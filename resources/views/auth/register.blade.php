<x-layout.app>
    <x-container>
        <x-card title="Register">
            <x-form :route="route('register')" post id="register-form">
                <x-input type="name" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
                <x-input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
                <x-input type="email_confirmation" name="email_confirmation" id="email_confirmation" placeholder="Email Confirmation"/>
                <x-input type="password" name="password" id="password" placeholder="Password" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('login')">Already have an account?</x-a>
                <x-button type="submit" form="register-form">Register</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
