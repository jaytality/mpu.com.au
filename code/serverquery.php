<?php
/**
 * serverquery
 * scans the servers - and dumps their info the database so that it can be scanned by the regular
 * website page
 *
 * @author Johnathan Tiong <johnathan.tiong@mpu.com.au>
 */

// root constant
define('ROOT', dirname(__FILE__));

require 'vendor/autoload.php';

require ROOT.'/config.php';
require ROOT.'/R.php';

R::setup(getConfig('database.type').':host=172.25.0.200;dbname='.getConfig('database.name'), getConfig('database.user'), getConfig('database.pass'));
R::ext('xdispense', function ($type) {
    return R::getRedBean()->dispense($type);
});

// echo R::testConnection() ? 'connected to the DB' : 'not connected to the DB' . PHP_EOL . 'connection string: ' . getConfig('database.type').':host='.getConfig('database.host').';dbname='.getConfig('database.name'), getConfig('database.user'), getConfig('database.pass') . PHP_EOL; die();

$serverList = [
    [
        'type' => 'rust',
        'host' => '182.160.156.47:28017',
        'id'   => 'solos',
    ],[
        'type' => 'rust',
        'host' => '182.160.156.47:28025',
        'id'   => 'monthly',
    ],[
        'type' => 'minecraft',
        'host' => '182.160.156.47:25565',
        'id'   => 'mcsurvival',
    ]
];

$gq = new \GameQ\GameQ();
$gq->setOption('timeout', 5);
$gq->setOption('debug', true);
$gq->addServers($serverList);

$servers = $gq->process();

echo 'Adding servers... ' . PHP_EOL;

foreach ($servers as $server) {
    // check if server exists based on join link
    $serverCheck = R::findOne('game_servers', ' joinlink = ?', [ $server['gq_joinlink'] ]);

    if (empty($serverCheck)) {
        $newServer = R::xdispense('game_servers');
        $newServer['lastupdated'] = time();
        $newServer['hostname']    = $server['gq_hostname'];
        $newServer['type']        = $server['gq_gametype'];
        $newServer['joinlink']    = $server['gq_joinlink'];
        $newServer['maxplayers']  = $server['gq_maxplayers'];
        $newServer['numplayers']  = $server['gq_numplayers'];
        $newServer['byline']      = null;
        $newServer['description'] = null;
        $newServer['online']      = $server['gq_online'];
        $newServerId = R::store($newServer);
        echo "\tAdded: {$server['gq_hostname']}\n";

        // new server - record player count for the first time
        $serverStats = R::xdispense('game_servers_stats');
        $serverStats['lastupdated'] = time();
        $serverStats['server'] = $newServerId;
        $serverStats['playercount'] = $server['gq_numplayers'];
    } else {
        $serverCheck['lastupdated'] = time();
        $serverCheck['hostname']   = (!empty($server['gq_hostname'])) ? $server['gq_hostname'] : $serverCheck['hostname'];
        $serverCheck['type']       = (!empty($server['gq_gametype'])) ? $server['gq_gametype'] : $serverCheck['type'];
        $serverCheck['joinlink']   = $server['gq_joinlink'];
        $serverCheck['maxplayers'] = $server['gq_maxplayers'];
        $serverCheck['numplayers'] = $server['gq_numplayers'];
        $serverCheck['online']     = $server['gq_online'];
        R::store($serverCheck);
        echo "\tUpdated: {$server['gq_hostname']}\n";

        $serverStatCheck = R::findAll('game_servers_stats', ' ORDER BY lastupdated DESC LIMIT 1');

        if (
            (empty($serverStatCheck))
            || ((time() - $serverStatCheck['lastupdated']) >= 3600)  // hour or so since last stat update
        ) {
            //insert a new historical record
            $serverStats = R::xdispense('game_servers_stats');
            $serverStats['lastupdated'] = time();
            $serverStats['server'] = $serverCheck['id'];
            $serverStats['playercount'] = $server['gq_numplayers'];
        }
    }
    R::store($serverStats);
}

echo 'Finished!' . PHP_EOL;

R::close();

// end of file
