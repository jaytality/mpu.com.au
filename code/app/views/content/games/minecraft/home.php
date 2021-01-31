<br />

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card p-0">
                <!-- banner image can go here -->
                <div class="card-body">
                    <h1 class="card-title">
                        Minecraft
                    </h1>

                    <h3 class="card-subtitle mb-2 text-muted">
                        <small>
                            Information about our Minecraft Servers, custom commands, and more!
                        </small>
                    </h3>
                </div>
            </div>
            <br />
        </div>
    </div>

    <!-- NAVIGATION -->
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="#info" data-toggle="tab">Server Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rules" data-toggle="tab">Rules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#recipes" data-toggle="tab">Custom Recipes &amp; Commands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#statistics" data-toggle="tab">Statistics</a>
                </li>
            </ul>
            <br />
        </div>
    </div>

    <div class="tab-content">
        <!-- GAME SERVERS INFO -->
        <div class="tab-pane active" id="info">
            <h3>Game Server Info</h3>
            <hr />
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
                                        <?=$server->byline?>
                                    </h5>

                                    <div class="card-text">
                                        <small><?=$server->description?></small>
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
                    <hr />
                    <h5>About our Minecraft Server</h5>
                    <p>
                        Our server is based on the Mojang dedicated server jar - meaning we can keep up with official updates at will. We're a <b class="text-danger">Survival</b> mode server
                        with an <b class="text-danger">active whitelist</b>. We try to give players as much freedom as possible;
                    </p>
                    <br />
                    <hr />
                    <h5>Connecting to our Server</h5>
                    <p>
                        To connect to our server, you'll need to be whitelisted. Simply follow these directions and you'll be able to play in no time:
                    </p>
                    <ol>
                        <li>Join our <a href="https://discord.gg/hxac7GzTEy">Discord Server</a></li>
                        <li>Hop into the <code>#minecraft</code> channel in Game Servers</li>
                        <li>Send a message to the channel <code>!maid whitelist YOURMINECRAFTNAME</code></li>
                        <li>You should receive a reply from MPU Minecraft bot that you're now whitelisted</li>
                        <li>Hop into Minecraft > Multiplayer > Add Server</li>
                        <li>Add the address <code>minecraft.mpu.com.au</code></li>
                        <li>Connect! Have fun!</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- RULES -->
        <div class="tab-pane" id="rules">
            <div class="row">
                <div class="col">
                    <h3>Rules</h3>
                    <hr />
                    <p>
                        Minecraft is our more "chill" game of the community - and we like to focus towards being that. It's a place to unwind, unleash some creativity, maybe prank
                        a few friends, etc. Pretty much anything goes on our server, but there's a few hardline rules:
                    </p>
                    <ul>
                        <li><b class="text-warning">No glitching, hacking, ban evasion</b> - straight to permaban.</li>
                        <li><b class="text-warning">Do not impersonate Admins, or Abuse them</b> - they're there to help you out with any issues, everyone is playing for fun. Instant permaban!</li>
                        <li><b class="text-warning">Do not be racist, sexist, etc.</b> - that'll result in a 3 day ban, instantly</li>
                        <li><b class="text-warning">No racist symbols/signs</b> - it's 2021, stop that. Admins will remove these without warning, do it more than once and it's by Admin discretion if you're banned.</li>
                        <li><b class="text-warning">No Advertising</b> - bannable offense. You're on our servers to have fun, and play Minecraft</li>
                        <li><b class="text-warning">No Real Life Threats</b> - If things being said and done are crossing over from in-game, to IRL. Call the police, and let us know, we can provide connection info to them.</li>
                        <li><b class="text-warning">No Doxxing</b> - Respect privacy! Any release of personal identifiable information without permission is an immediate permaban. If bad enough, Police will be involved.</li>
                    </ul>
                    <hr />
                    <h4>Specifically to Minecraft...</h4>
                    <ul>
                        <li><b class="text-warning">There's really no need to steal other people's stuff.</b> Repeatedly doing so will result in a ban at Admin discretion</li>
                        <li><b class="text-warning">Don't break other people's stuff.</b> You'll have to help them either repair/rebuild it, or face a temporary ban.</li>
                        <li><b class="text-warning">Don't grief people</b>; you can muck around, sure. But if it reaches a point that it's consistent harassment, Admins will take action</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- RECIPES -->
        <div class="tab-pane" id="recipes">
            <div class="row">
                <div class="col">
                    <h3>Commands</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <h5><span class="text-info"><i class="fab fa-discord"></i> Discord</span> Commands</h5>
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Command</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <code>!maid whitelist [minecraft-name]</code>
                                        </td>
                                        <td>
                                            Adds [minecraft-name] to our whitelist
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5><span class="text-success"><i class="fas fa-cubes"></i> Minecraft</span> Commands</h5>
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Command</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <code>!maid spawn</code>
                                        </td>
                                        <td>
                                            Teleports you to Spawn
                                            <br />
                                            <small class="text-muted">(10 minute cooldown)</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <code>!maid enderchest</code>
                                        </td>
                                        <td>
                                            Gives you an Enderchest<br />
                                            <small class="text-muted">(24 hour Cooldown)</small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3>Custom Recipes</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 480px;">Recipe</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/image-1.png" alt="">
                                        </td>
                                        <td>
                                            Diamond Horse Armor
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/goldarmor.png" alt="">
                                        </td>
                                        <td>
                                            Gold Horse Armor
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/ironarmor.png" alt="">
                                        </td>
                                        <td>
                                            Iron Horse Armor
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/slimeball.png" alt="">
                                        </td>
                                        <td>
                                            Slime Ball
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/image-2.png" alt="">
                                        </td>
                                        <td>
                                            Name Tag
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://control.mpu.com.au/wp-content/uploads/2021/01/image-1-1.png" alt="">
                                        </td>
                                        <td>
                                            Saddle
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTICS -->
        <div class="tab-pane" id="statistics">
            <div class="row">
                <div class="col">
                    <h3>Statistics</h3>
                    <hr />
                    Stats are coming soon!
                </div>
            </div>
        </div>

        <!-- end of tabs -->
    </div>

</div>
