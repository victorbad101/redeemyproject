<x-app>
<p>{{$post->name}}</p>
    <form action="{{ route('vinyl.remover', ['id' => $post->id]) }}" method="post">
        @csrf
        <p>Code</p><input type="text" name="download_code">
        <button type="submit">Submit</button>
    </form>
</x-app>