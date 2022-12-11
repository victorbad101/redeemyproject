<x-app>
    <form action="{{ route('user.register.store') }}" method="post">
        @csrf
        <p>Name</p><input name="name" type="text">
        <p>Email</p><input name="email" type="email">
        <p>Password</p><input name="password" type="password">
        <p>Author</p><input type="checkbox" name="is_admin" value=true>
        <p></p>
        <button type="submit">Submit</button>
    </form>
    <script>
        function validateAdmin()
        {
            var checker = document.getElementById('isAdmin');

        }
    </script>
</x-app>
