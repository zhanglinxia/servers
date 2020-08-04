<?php
class WebSocketServer
{
    public $host = '0.0.0.0';
    public $port = '8888';
    public $server = null;
    public function __construct(){
        $this->server = new Swoole\WebSocket\Server($this->host,$this->port);
        //监听连接事件：设置回调函数（对象方法）
        $this->server->on('open',[$this,'onOpen']);
        $this->server->on('message',[$this,'onMessage']);
        $this->server->on('close',[$this,'onClose']);
        $this->server->start();
    }
    /**
     * 监听连接请求事件
     */
    public function onOpen(Swoole\WebSocket\Server $server,Swoole\Http\Request $request){
        echo "与服务器成功建立连接".PHP_EOL;
    }
    /**
     * 监听消息事件 frame 描述服务器端和客户端发送对象
     */
    public function onMessage(Swoole\WebSocket\Server $server, Swoole\WebSocket\Frame $frame){
    }

    /**
     * 监听客户端关闭连接(服务器期端主动关闭，也会调用)
     * @param \Swoole\WebSocket\Frame $frame
     */
    public function onClose(Swoole\WebSocket\Server $server,Swoole\WebSocket\Frame $frame)
    {

    }
}
$ws = new WebSocketServer();
