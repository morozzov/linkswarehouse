<article class="card-body">
    <?php foreach ($data as $link): ?>
        <div class="container my-3">
            <a href="<?= $link->Url ?>" style='text-decoration: none; color: #191c1f;'>
                <div class="row align-items-center rounded-3 border-<?php if ($link->Visibility == 0) {
                    echo "danger";
                } else {
                    echo "primary";
                }
                ?> border active">
                    <div class="col-lg-12 p-3 p-lg-4 pt-lg-3">
                        <p class="h3 lh-1"><?= $link->Name ?></p>
                        <p class="lead"><?= $link->About ?></p>
                        <p class="link-secondary"><?= $link->Date ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</article>
