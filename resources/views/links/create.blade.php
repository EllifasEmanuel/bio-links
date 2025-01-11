<div>
    <h1>Criar um link</h1>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{route('links.store')}}" method="post">
        @csrf
        <div>
            <input type="text" name="link" id="link" placeholder="Link" value="{{ old('link') }}">
            @error('link')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
