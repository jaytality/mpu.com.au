<?php
/**
 * serverquery
 * scans the servers - and dumps their info the database so that it can be scanned by the regular
 * website page
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
        'type' => 'cs16',
        'host' => '182.160.156.47:27016',
        'id'   => 'csgungame',
    ],[
        'type' => 'cs16',
        'host' => '182.160.156.47:27015',
        'id'   => 'csbloodstrike',
    ],[
        'type' => 'rust',
        'host' => '182.160.156.47:29015',
        'id'   => 'rustvanilla',
    ],[
        'type' => 'rust',
        'host' => '182.160.156.47:28017',
        'id'   => 'solos',
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
        $newServer['online']      = $server['gq_online'];
        R::store($newServer);
        echo "\tAdded: {$server['gq_hostname']}\n";
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
    }
}

echo 'Finished!' . PHP_EOL;

R::close();

// end of file
