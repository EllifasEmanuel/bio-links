<div>
    <h1>Dashboard</h1>
    <h2>User {{auth()->user()->name}} :: {{auth()->id()}}</h2>

    @if ($message = session()->get('message'))
        <p>{{ $message }}</p>
    @endif

    <a href="{{route('links.create')}}">Criar</a>

    <ul>
        @foreach($links as $link)
            <li style="display: flex;">

                @if(!$loop->last)
                    <form action="{{route('links.down', $link)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button>Down</button>
                    </form>
                @endunless

                @unless($loop->first)
                    <form action="{{route('links.up', $link)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button>Up</button>
                    </form>
                @endif

                <a href="{{route('links.edit', $link->id)}}">
                    {{$link->id}} - {{ $link['name'] }}
                </a>

                <form action="{{route('links.destroy', $link)}}" method="POST" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button>Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
