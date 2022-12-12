<x-app>
    @auth()
        <h2>Hello {{ auth()->user()->name }}</h2>
        <x-logout />
{{--        {{ $test->name }}--}}
        <table>
            @foreach ($vinyls as $vinyl)
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                </tr>
                <tr>
                    <th>{{ $vinyl->name }}</th>
                    <th>{{ $vinyl->author->name }}</th>
                </tr>
            @endforeach
        </table>
    @else
        <a href="{{ route('user.register.create') }}">Register</a> <br />
        <a href="{{ route('user.login.create') }}">Log In</a>
    @endauth
</x-app>
