<article class="card-body">
    <div class="container my-3">
        <div class="row align-items-center rounded-3 border-primary border active">


            <div class="col-lg-12 p-3 p-lg-4 pt-lg-3">
                <?php $user = $data; ?>
                <form method="post" action="/users/edit">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name"
                               placeholder="name" value="<?= $user->Name ?>">
                        <label for="floatingInput">Your name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="login"
                               placeholder="login" value="<?= $user->Login ?>">
                        <label for="floatingInput">Your login</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password1"
                               placeholder="password">
                        <label for="floatingInput">New password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password2"
                               placeholder="password">
                        <label for="floatingInput">New password again</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <input type='submit' class='btn btn-primary' value='Save'>
                        </div>
                        <div class="col-auto">
                            <a href="/users/logOut" class='btn btn-danger'>Log out</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>