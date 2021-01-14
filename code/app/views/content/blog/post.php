<br />

<div class="container">
    <div class="row">
        <div class="col">
        <div class="card p-0">
            <?php
            if (!empty($post->featured_media)) {
                $image = \spark\Models\BlogModel::getFeaturedMediaUrl($post->featured_media);
                ?>
                <img src="<?=$image->source_url?>" class="card-img-top" alt="<?=$post->title->rendered?>">
                <?php
            }

            $author = \spark\Models\BlogModel::getAuthorById($post->author);
            ?>
            <div class="card-body">
                <h3 class="card-title">
                    <?=$post->title->rendered?>
                </h3>

                <h6 class="card-subtitle mb-2 text-muted">
                    <small>
                        <?=date('d/M/Y @ h:i:s', strtotime($post->date))?> - <?=$author->name?>
                    </small>
                </h6>

                <p class="card-text">
                    <em class="text-muted">
                        <?=$post->excerpt->rendered?>
                    </em>

                    <hr />

                    <?=$post->content->rendered?>
                </p>
            </div>
        </div>
        <br />
        </div>
    </div>
</div>
