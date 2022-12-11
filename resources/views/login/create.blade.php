<x-app>
    <form action="{{ route('user.login.store') }}" method="post">
        @csrf
        <p>Email</p><input type="email" name="email">
        <p>Password</p><input type="password" name="password">
        <p></p>
        <button type="submit">Submit</button>
    </form>
</x-app>
