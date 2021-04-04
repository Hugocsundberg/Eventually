<x-app>
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <p>Hello, this is register</p>
            <form class="center-center-col" method="post" action="/register">
                @csrf
                <Label for="email">Email</Label>
                <input id="email" name="email" type="email">
                <Label for="password">Password</Label>
                <input id="password" name="password" type="password">
                <Label for="name">Name</Label>
                <input id="name" name="name" type="name">
                <input id="password" type="submit" value="Register">
            </form>
            <a href="/login">Login</a>
        </div>
    </div>
</x-app>