<x-app>
    <form action="{{ route('vinyl.store') }}" method="POST">
        @csrf
        @method('POST')
        <p>Name</p><input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
</x-app>
