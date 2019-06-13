<?php

namespace WebSocket\Application;

/**
 * Websocket-Server demo and test application.
 * 
 * @author Simon Samtleben <web@lemmingzshadow.net>
 */
class DemoApplication extends Application
{
    private $_clients = array();

	public function onConnect($client)
    {
		$id = $client->getClientId();
        $this->_clients[$id] = $client;

        if(array_key_exists($client->getClientId(),$GLOBALS )){
            foreach ($GLOBALS[$client->getClientId()] as $message){
                $client->send(json_encode($message));
                //echo json_encode($message);
            }
            unset($GLOBALS[$client->getClientId()]);
        }

    }

    public function onDisconnect($client)
    {
        $id = $client->getClientId();		
		unset($this->_clients[$id]);     
    }

    public function onData($data, $client)
    {


        $decodedData = $this->_decodeData($data);
		if($decodedData === false){
            echo 'error';
            return;
        }
        $decodedData->date=date('y-m-d H:i:s');
		if(array_key_exists($decodedData->toid,$this->_clients)){
            $this->_clients[$decodedData->toid]->send(json_encode($decodedData));
        }else{
           if(array_key_exists($decodedData->toid,$GLOBALS)) {
                array_push($GLOBALS[$decodedData->toid],$decodedData);
            }else{
                $arr=array($decodedData);
               $GLOBALS[$decodedData->toid]=$arr;
            }
        }
    }
}