<x-app>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <p>Name</p><input name="name" type="text">
        <p>Email</p><input name="email" type="email">
        <p>Password</p><input name="password" type="password">
        <p></p>
        <button type="submit">Submit</button>
    </form>
</x-app>