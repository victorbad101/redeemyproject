<x-app>
    <form action="{{ route('vinyl.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Name</p><input type="text" name="name">
        <p>File</p><input type="file" name="file">
        <button type="submit">Submit</button>
    </form>
</x-app>
