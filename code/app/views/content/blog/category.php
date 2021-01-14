<br />

<div class="container">
    <div class="row">
        <div class="col">
            <h3><?=$category->name?></h3>
            <?php
            foreach ($posts as $post) {
                ?>
                <div class="card p-0">
                    <?php
                    if (!empty($post->featured_media)) {
                        $image = \spark\Models\BlogModel::getFeaturedMediaUrl($post->featured_media);
                        ?>
                        <a href="/blog/post/<?=$post->id . '-' . $post->slug?>">
                            <img src="<?=$image->source_url?>" class="card-img-top" alt="<?=$post->title->rendered?>">
                        </a>
                        <?php
                    }

                    $author = \spark\Models\BlogModel::getAuthorById($post->author);
                    ?>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="/blog/post/<?=$post->id . '-' . $post->slug?>"><?=$post->title->rendered?></a>
                        </h4>

                        <h6 class="card-subtitle mb-2 text-muted">
                            <small>
                                <?=date('d/M/Y @ h:i:s', strtotime($post->date))?> - <?=$author->name?>
                            </small>
                        </h6>

                        <p class="card-text">
                            <?=$post->excerpt->rendered?>
                        </p>
                    </div>
                </div>
                <br />
                <?php
            }
            ?>
        </div>
    </div>
</div>
