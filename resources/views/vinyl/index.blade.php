<x-app>
    @auth()
        <h2>Hello {{ auth()->user()->name }}</h2>

        <h3>LogOut</h3>
            <form 
    @else

    @endauth
</x-app>