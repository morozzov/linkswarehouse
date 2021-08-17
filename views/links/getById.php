<article class="card-body">

    <div class="container my-3">
        <a href="/links/addForm" style='text-decoration: none; color: #191c1f;'>
            <div class="row align-items-center rounded-3 border-success border active">
                <div class='d-flex flex-column'>
                    <div class='p-1 bd-highlight'>
                        <p class="display-5 fw-bold lh-1">+</p>
                    </div>
                    <div class='p-1 bd-highlight'>
                        <p class="lead">Add new link</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <?php foreach ($data as $link): ?>
        <div class="container my-3">


            <div class="row align-items-center rounded-3 border-<?php if ($link->Visibility == 0) {
                echo "danger";
            } else {
                echo "primary";
            }
            ?> border active">
                <a href="<?= $link->Url ?>" style=' text-decoration: none; color: #191c1f;'>


                    <div class="col-lg-12 p-3 p-lg-4 pt-lg-3">
                        <p class="h3 lh-1"><?= $link->Name ?></p>
                        <p class="lead"><?= $link->About ?></p>
                        <p class="link-secondary"><?= $link->Date ?></p>
                    </div>

                    <!--                    <div class='d-flex flex-row'>-->
                    <!--                        <div class='p-2 bd-highlight'>-->
                    <!--                            <a class="btn btn-info me-2" href="/users/getbyid/-->
                    <? //= $link->Id ?><!--">Edit</a>-->
                    <!--                        </div>-->
                    <!--                        <div class='p-2 bd-highlight'>-->
                    <!--                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"-->
                    <!--                                    data-bs-target="#confirmDeleteModal" data-id="-->
                    <? //= $link->Id ?><!--"-->
                    <!--                                    id="button-open-modal">-->
                    <!--                                Delete-->
                    <!--                            </button>-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                </a>

                <div class="row m-0 p-0">
                    <div class="col-auto m-0">
                        <div class="dropdown" style="width: auto">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown"
                               aria-expanded="false">Actions</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown09">
                                <li>
                                    <form method="post" action="/links/editForm">
                                        <input type='text' value='<?= $link->Id ?>' hidden='hidden' name='rowId'>
                                        <input type="submit" class="dropdown-item me-2" value="Edit">
                                    </form>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item " data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" data-id="<?= $link->Id ?>"
                                            id="button-open-modal">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col m-0 p-0">
                        <a href="<?= $link->Url ?>" style=' text-decoration: none; color: #191c1f;'>
                            <div style="width: 100%; height: 100%"></div>
                        </a>
                    </div>

                </div>
            </div>

        </div>

    <?php endforeach; ?>
</article>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Confirm removal of this link
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <form method="post" action="/links/deleteById">
                    <input type="text" id="input-id-field" name="id" value="" hidden>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).on("click", "#button-open-modal", function () {
        var linkId = $(this).data('id');
        $("#input-id-field").val(linkId);
    });
</script>