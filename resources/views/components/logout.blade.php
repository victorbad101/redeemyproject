<h3>LogOut</h3>
            <form method="post" action=" {{ route('user.logout') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Submit</button>
        </form>
