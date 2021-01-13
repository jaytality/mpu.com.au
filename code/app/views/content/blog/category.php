<br />

<div class="container">
    <div class="row">
        <div class="col">
            <h3><?=$category->name?></h3>
            <?php
            foreach ($posts as $post) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?=$post->title->rendered?></h4>
                        <h6 class="card-subtitle mb-2 text-muted"><small><?=date('d/M/Y @ h:i:s', strtotime($post->date))?></small></h6>
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
