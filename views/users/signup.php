<head>
    <link href="/public/vendors/bootstrap502/css/signup.css" rel="stylesheet">
</head>

<form method="post" action="/users/addNew">

    <img class="mb-4" src="/img/chainIcon.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

    <div class="form-floating mb-1">
        <input name="name" type="text" class="form-control" placeholder="name">
        <label name="name" for="floatingInput">Name</label>
    </div>
    <div class="form-floating mb-1">
        <input name="login" type="email" class="form-control" placeholder="login">
        <label name="login" for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-1">
        <input name="password1" type="password" class="form-control" placeholder="Password">
        <label name="password" for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mb-3">
        <input name="password2" type="password" class="form-control" placeholder="Password">
        <label name="password" for="floatingPassword">Password again</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Sign up</button>
    <a href="/users/signin">
        <button class="w-100 btn btn-lg btn-outline-danger mb-1" type="button">Cancel</button>
    </a>
</form>
