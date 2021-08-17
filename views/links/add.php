<article class="card-body">
    <div class="container my-3">
        <div class="row align-items-center rounded-3 border-primary border active">
            <div class="col-lg-12 p-3 p-lg-4 pt-lg-3">
                <form method="post" action="/links/addNew">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name"
                               placeholder="name@example.com">
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="text" class="form-control" id="floatingInput"
                               placeholder="name@example.com">
                        <label for="floatingInput">About text</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="url" class="form-control" id="floatingInput"
                               placeholder="name@example.com">
                        <label for="floatingInput">Link</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="visibility" value="visibility"> Visible
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class='form-control border-0' method='post'>
                                <input type='text' hidden='hidden' name='rowId'>
                                <input type='submit' class='btn btn-primary' value='Add'>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="/links/getbyid" class="btn btn-outline-danger"> Cancel </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</article>