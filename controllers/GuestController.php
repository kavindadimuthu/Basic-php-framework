<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\BaseController;

class GuestController extends BaseController
{
    public function home($req, $res){
//        $res->render('pages/home');
        $this->renderPage('pages/home');
    }

    public function about($req, $res){
        $this->renderPage('pages/about');
    }

    public function user($req, $res){
        $userId = $req->getParam('id') ?? null;
        $res->send("User ID: " . htmlspecialchars($userId));
    }

}