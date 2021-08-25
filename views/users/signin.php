<head>
    <link href="/public/vendors/bootstrap502/css/signin.css" rel="stylesheet">
</head>

<form method="post" action="/users/auth">
    <img class="mb-4" src="/img/chainIcon.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Sign in</h1>

    <div class="form-floating">
        <input name="login" type="email" class="form-control" placeholder="login">
        <label name="login" for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <label name="password" for="floatingPassword">Password</label>
    </div>

    <!--        <div class="checkbox mb-3">-->
    <!--            <label>-->
    <!--                <input type="checkbox" value="remember-me"> Remember me-->
    <!--            </label>-->
    <!--        </div>-->
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="small text-center text-gray-soft">Don't have an account yet? <a href="/users/signup">Sign up</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
