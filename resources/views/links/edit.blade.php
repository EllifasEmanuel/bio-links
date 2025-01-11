<div>
    <h1>Criar um link</h1>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{route('links.edit', $link)}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="link" id="link" placeholder="Link" value="{{ old('link', $link->link) }}">
            @error('link')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $link->name) }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <a href="{{route('dashboard')}}">Cancelar</a>

        <button type="submit">Salvar</button>
    </form>
</div>
