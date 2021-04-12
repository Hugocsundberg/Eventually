<x-app>
    @section('title', 'Register');
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <p>Hello, this is register</p>
            <form class="" method="post" action="/register">
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
                <div class="mb-3">
                    <label class="form-label" for="password">Name</label>
                    <input class="form-control" id="name" name="name" type="name">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p class="mt-4">Already have an account?</p>
            <a class="btn btn-secondary" href="/login">Login</a>
        </div>
    </div>
</x-app>