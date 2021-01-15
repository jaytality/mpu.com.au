<br />

<div class="container">
    <div class="row">
        <div class="col-md-6">
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

        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Like what we're doing? Support Us!</h4>

                            <h6 class="card-subtitle mb-2 text-muted">
                                Running game servers, and keeping things online actually does cost quite a bit of money - and we'd really appreciate your help in keeping a bit of Aussie
                                Gaming History online!
                            </h6>

                            <p class="card-text">
                                <a href="https://www.patreon.com/bePatron?u=368007" data-patreon-widget-type="become-patron-button">Become a Patron!</a>
                                <script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
                            </p>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                <iframe src="https://discord.com/widget?id=123947704198889472&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Game Server Status</h5>
                    <small class="text-muted">Click on a Server Name to join! (Steam/Game Launcher may be Required)</small>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Server</th>
                                <th>Players</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($servers as $server) {
                                    ?>
                                        <tr>
                                            <td><small><a href="<?=$server['joinlink']?>"><?=$server['hostname']?></a></small></td>
                                            <td class="text-center"><small><?=$server['numplayers'] . '/' . $server['maxplayers']?></small></td>
                                            <td>
                                                <?php
                                                if ($server['online'] == TRUE) {
                                                    ?>
                                                        <span class="badge badge-success">ONLINE</span></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span class="badge badge-danger">OFFLINE</span></td>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <br />
                </div>
            </div>

        </div>
    </div>
</div>
