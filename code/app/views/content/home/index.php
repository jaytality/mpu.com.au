<br />

<div class="container">
    <div class="row">
        <div class="col-md-6">
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

        <div class="col-md-6">
            <div class="row">
                <div class="col">
                <iframe src="https://discord.com/widget?id=123947704198889472&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Game Server Status</h5>
                    <?php
                    $gq = new \GameQ\GameQ();
                    $gq->setOption('timeout', 5);
                    $gq->setOption('debug', true);
                    $gq->addServers([
                        [
                            'type'    => 'cs16',
                            'host'    => '182.160.156.47:27016',
                            'id'      => 'csgungame',
                        ],[
                            'type' => 'cs16',
                            'host' => '182.160.156.47:27015',
                            'id'   => 'csbloodstrike',
                        ],[
                            'type' => 'rust',
                            'host' => '182.160.156.47:28015',
                            'id'   => 'rustmonthly',
                        ]
                    ]);

                    $servers = $gq->process();
                    ?>
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
                                    if ($server['gq_online'] == TRUE) {
                                    ?>
                                        <tr>
                                            <td><small><?=$server['gq_hostname']?></small></td>
                                            <td class="text-center"><small><?=count($server['players']) . '/' . $server['gq_maxplayers']?></small></td>
                                            <td><span class="badge badge-success">ONLINE</span></td>
                                        </tr>
                                    <?php
                                    }
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
