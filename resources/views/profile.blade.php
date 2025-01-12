<div>
    <h1>Profile</h1>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <img src="/storage/{{$user->photo}}}" alt="Profile Picture">
            <input type="file" name="photo" id="photo" placeholder="Nome" value="{{old('photo')}}">
            @error('photo')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="text" name="name" id="name" placeholder="Nome" value="{{old('name', $user->name)}}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <textarea name="description" id="description" placeholder="Breve descrição"></textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <span>biolinks.com.br/@</span>
            <input type="text" name="handler" id="handler" placeholder="@seuLink"  value="{{old('name', $user->handler)}}">
            @error('handler')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <a href="{{route('dashboard')}}">Cancelar</a>
        <button type="submit">Atualizar</button>
    </form>
</div>
