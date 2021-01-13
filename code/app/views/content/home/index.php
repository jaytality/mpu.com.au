<br />

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5>Community News</h5>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">We're back online!</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Jaytizzle - 13-JAN-2021 11:12am</h6>
                    <p class="card-text">
                        It's been a while folks - but after a huge hiatus, we're finally back online. MPU
                        lost its direction for a little while, followed by the shenanigans of COVID in 2020;
                        I had to come to a decision of whether or not I'd let MPU just die out, or continue
                        on with it.
                    </p>
                </div>
            </div>
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
                    $gq->setOption('debug', false);
                    $gq->addServers([
                        [
                            'type' => 'cs16',
                            'host' => '182.160.156.47:27016',
                            'id'   => 'csgungame',
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
                </div>
            </div>

        </div>
    </div>
</div>
