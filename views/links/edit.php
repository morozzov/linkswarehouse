<article class="card-body">
    <div class="container my-3">
        <div class="row align-items-center rounded-3 border-primary border active">
            <div class="col-lg-12 p-3 p-lg-4 pt-lg-3">
                <?php $row = $data; ?>
                <form method="post" action="/links/edit">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="<?= $row->Name ?>" name="name"
                               placeholder="name@example.com">
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" value="<?= $row->About ?>" name="text" class="form-control"
                               placeholder="name@example.com">
                        <label for="floatingInput">About text</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" value="<?= $row->Url ?>" name="url" class="form-control"
                               placeholder="name@example.com">
                        <label for="floatingInput">Link</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="visibility"
                                   value="visibility" <?php if ($row->Visibility == 1) echo "checked" ?>> Visible
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class='form border-0' method='post'>
                                <input type='text' value="<?= $row->Id ?>" hidden='hidden' name='rowId'>
                                <input type='submit' class='btn btn-primary' value='Edit'>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="/links/getbyid">
                                <button type="button" class="btn btn-outline-danger">Cancel</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>