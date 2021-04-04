<x-app>
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <p>Hello, this is login</p>
            <form class="" method="post" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p class="mt-4">Don't have an account?</p>
            <a class="btn btn-secondary" href="/register">Register</a>
        </div>
    </div>
</x-app>