<div>
    <h1>Login</h1>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <form action="/login" method="post">
        @csrf

        <div>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Logar</button>
    </form>
</div>
