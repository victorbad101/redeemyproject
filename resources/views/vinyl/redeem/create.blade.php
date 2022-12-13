<x-app>
    <p>{{$post->name}}</p>
    <form action="{{ route('vinyl.remover', ['id' => $post->id]) }}" method="post" onsubmit="return false">
        @csrf
        <p>Code</p><input type="text" name="download_code" id="download_code">
        <button type="button">Ss</button>

        <a href="{{ asset(str_replace('public/','/storage/',$post->vinyl_file)) }}">Download</a>

    </form>
</x-app>