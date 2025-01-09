<div>
    <h1>Login</h1>

    <form action="/login" method="post">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Logar</button>
    </form>
</div>
