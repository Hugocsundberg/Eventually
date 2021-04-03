<x-app>
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            @include('errors')
            <p>Hello, this is login</p>
            <form class="center-center-col" method="post" action="/login">
                @csrf
                <Label for="email">Email</Label>
                <input id="email" name="email" type="email">
                <Label for="password">Password</Label>
                <input id="password" name="password" type="password">
                <input id="password" type="submit" value="Login">
            </form>
        </div>
    </div>
</x-app>