<br />

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card p-0">
                <!-- banner image can go here -->
                <div class="card-body">
                    <h1 class="card-title">
                        Rust
                    </h1>

                    <h3 class="card-subtitle mb-2 text-muted">
                        <small>
                            Information about our Rust Servers, and more!
                        </small>
                    </h3>
                </div>
            </div>
            <br />
        </div>
    </div>

    <!-- GAME SERVERS -->
    <div class="row">
        <?php
        foreach ($servers as $server) {
            ?>
                <div class="col-md-4">
                    <div class="card p-0">
                        <div class="card-header">
                            <small><?=$server->hostname?></small>
                        </div>
                        <!-- banner image can go here -->
                        <div class="card-body">
                            <h5 class="card-subtitle mb-2 text-muted">
                                Server Byline
                            </h5>

                            <div class="card-text">
                                "Description field"
                                <br />
                                <ul>
                                    <li>Feature Points</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="<?=$server->joinlink?>" class="btn btn-sm btn-block btn-success"><i class="fab fa-steam-square fa-lg"></i> &nbsp; Click here to Connect via Steam</a>
                        </div>
                    </div>
                    <br />
                </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <div class="col">
            <h3>Rules</h3>
            <p>
                Look, Rust, unlike other popular titles, almost takes pride in the sheer chaos that ensues in the game. It's a survival game, where players
                can openly choose to be very aggressive. Pretty much anything goes on our server, but there's a few hardline rules:
            </p>
            <ul>
                <li><b class="text-warning">No glitching, hacking, ban evasion</b> - straight to ban.</li>
                <li><b class="text-warning">Do not impersonate Admins, or Abuse them</b> - they're there to help you out with any issues, everyone is playing for fun</li>
                <li><b class="text-warning">Do not be racist, sexist, etc.</b> - that'll result in being muted instantly</li>
                <li><b class="text-warning">No racist symbols/signs</b> - it's 2021, stop that. Admins will remove these without warning, do it more than once and it's by Admin discretion if you're banned.</li>
                <li><b class="text-warning">No Advertising</b> - bannable offense. You're on our servers to have fun, and play Rust</li>
                <li><b class="text-warning">No Real Life Threats</b> - if someone says they're "going to f*** your mum" in global chat, that's not a real threat. We're talking about if you're getting tracked down and hunted IRL. Contact the proper authorities, and let us know, we can provide connection info to them.</li>
                <li><b class="text-warning">No Doxxing</b> - Respect people's privacy. Any release of personally identifiable information will result in an immediate permanent ban. If severe enough, Police will be involved.</li>
            </ul>
        </div>
    </div>
</div>
