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
                    <th>Buy</th>
                </tr>
                <tr>
                    <th>{{ $vinyl->name }}</th>
                    <th>{{ $vinyl->author->name }}</th>
                    <th><a href="{{ route('vinyl.redeem', ['id' => $vinyl->id, 'slug' => $vinyl->slug]) }}">Test</a></th>
                </tr>

            @endforeach

        </table>
    @else
        <a href="{{ route('user.register.create') }}">Register</a> <br />
        <a href="{{ route('user.login.create') }}">Log In</a>
    @endauth
</x-app>
