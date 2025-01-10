<div>
    <h1>Register</h1>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{route('register')}}" method="post">
        @csrf
        <div>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="email" name="email_confirmation" id="email_confirmation" placeholder="Email Confirmation" value="{{ old('email_confirmation') }}">
            @error('email_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Registrar</button>
    </form>
</div>
