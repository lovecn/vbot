<?php
/**
 * Created by PhpStorm.
 * User: HanSon
 * Date: 2016/12/7
 * Time: 16:33
 */

require_once __DIR__ . './../vendor/autoload.php';

use Hanson\Robot\Foundation\Robot;
use Hanson\Robot\Message\Message;
use Hanson\Robot\Message\Image;
use Hanson\Robot\Message\Text;
use Hanson\Robot\Message\Emoticon;
use Hanson\Robot\Message\Location;
use Hanson\Robot\Message\Video;
use Hanson\Robot\Message\MessageInterface;

$path = __DIR__ . '/./../tmp/';
$robot = new Robot([
    'tmp' => $path,
    'debug' => true
]);

$robot->server->setMessageHandler(function($message) use ($path){
    /** @var $message Message */

    // 位置信息 返回位置文字
    if($message instanceof Location){
        return $message;
    }

    // 发送撤回消息 （排除自己）
//    if($message->type === 'Recall' && $message->rawMsg['FromUserName'] !== myself()->username && $message->username === group()->getGroupsByNickname('stackoverflow', true)->first()['UserName']){
//        $msg = message()->get($message->msgId);
//        if($msg){
//            $nickname = $msg['sender'] ? $msg['sender']['NickName'] : account()->getAccount($msg['username'])['NickName'];
//            if($msg['type'] === 'Image'){
//                Text::send($message->username, "{$nickname} 撤回了一张照片");
//                Image::send($message->username, realpath($path . "jpg/{$message->msgId}.jpg"));
//            }elseif($msg['type'] === 'Emoticon'){
//                Text::send($message->username, "{$nickname} 撤回了一个表情");
//                Emoticon::send($message->username, realpath($path . "gif/{$message->msgId}.gif"));
//            }elseif($msg['type'] === 'Video' || $msg['type'] === 'VideoCall'){
//                Text::send($message->username, "{$nickname} 撤回了一个视频");
//                Video::send($message->username, realpath($path . "mp4/{$message->msgId}.mp4"));
//            }elseif($msg['type'] === 'Voice'){
//                Text::send($message->username, "{$nickname} 撤回了一条语音");
//            }else{
//                Text::send($message->username, "{$nickname} 撤回了一条信息 \"{$msg['content']}\"");
//            }
//        }
//    }

});

$robot->server->run();