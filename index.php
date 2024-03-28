<?php
include 'components/autoload.php';

use models\People;
use models\Links;
use components\Views;
use components\Mail;
use components\Admin;
use helpers\SignatureLetter;

$admin = new Admin();
$links = new Links();
$people = new People();

/**
 * Формирует шаблон писма исходя из выбраных отправителей из bd
 * @return void
 * @throws \components\ExceptionHandler
 */
function setMailTemplate() : void
{
    $data = $_POST;
    $people = new People();
    $people->customSearch = [
        'id' => [
            '>' => 3
        ]
    ];
    $data['people'] = $people->find();

    $data['cltr'] = $people->clTr();
    $sign = SignatureLetter::cases()[$data['mail_signature']];

    $data['sign_data'] = [];
    (isset($data['people_ids'])) ? $people->id = $data['people_ids'] : [];
    $s_people = $people->find();
    foreach ($s_people as $people) {
        $data['sign_data']['phones'][] = $people['phone'];
        $data['sign_data']['emails'][] = $people['email'];
    }

    $data['mail_template'] = Views::show('mail/content_' . $data['mail_template'], $data, false);
    $data['mail_signature'] = Views::show('mail/signature_' . $sign->SignColor(), $data, false);
    $crEmail = Views::show('create_mail', $data, false);

    if(isset($data['send']) && $data['send'] !== '0'){
        Mail::$to = 'webusis@gmail.com';
        Mail::$from = implode(',', $data['sign_data']['emails']);
        Mail::$subject = 'Проверка';
        Mail::$content = $crEmail;

        Mail::send();
    }

    die($crEmail);
}

if(Admin::getPID()){

    if(Admin::getAdmin()['id'] == 44){

        /**
         * Удаление записи в соответсвии с атриибутами
         * Может быть список полей из таблиц
         */
        if(isset($_POST['delete'])){
            $people->setAttributes($_POST);
            $people->delete();
            header('Location: /');
        }

        /**
         * Принимаются условия !=|<|>|in
         * Массив для сетера подходит для методов delete, find
         * [id => [!=|<|> => 'что-то']] [fname => [!= => 'что-то']] etc.
         */
        $people->customSearch = [
            'id' => [
                '!=' => 2,
                '>' => 3
            ]
        ];

        $data['mail_template'] = Views::show('mail/content', [], false);
        $data['mail_signature'] = Views::show('mail/signature', [], false);

        if(isset($_GET['setTmlm'])){
            setMailTemplate();
        }

        /**
         * Выхлоп в шаблон принимает сам шаблон name и передоваемые параметры в него
         */

        $data['people'] = $people->find();
        $data['cltr'] = $people->clTr();

        $data['mail_create'] = Views::show('create_mail', $data, false);

        $data['pmail'] = Views::show('admin/pmail', $data, false);
    }

    if(isset($_GET['pldel'],$_GET['tlink'])){
        $pd['tlink'] = $_GET['tlink'];
        $pd['pid'] = Admin::getAdmin()['id'];
        $links->setAttributes($pd);
        $links->delete();
        header('Location: /');
    }

    if(isset($_POST['lcreate'])){
        $links->setAttributes($_POST);
        if(empty($_POST['tlink'])){
            $links->setAttributes(['tlink' => substr(md5($_POST['olink']), 23)]);
        }

        if($dcheck = $links->find()){
            $data['errors']['tlink'] = 'Уже существует';
        }else{
            $links->setAttributes(['pid' => Admin::getAdmin()['id']]);
            $data = $links->create();
        }

        if(empty($data['errors'])){
            header('Location: /');
        }
    }

    if(isset($_GET['ledit'])){
        $links = new Links();

        $links->setAttributes(['tlink' => $_GET['ledit'], 'pid' => Admin::getAdmin()['id']]);
        $dlink = $links->find();

        if(isset($_POST['ledit']) && $dlink){
            $links->setAttributes($_POST);
            $links->id = $dlink[0]['id'];
            $links->update();
            header('Location: /');
        }

        $data['ledit'] = Views::show('admin/ledit', ['dlink' => $dlink[0]], false);
    }else{
        $data['lcreate'] = Views::show('admin/lcreate', [], false);
    }


    $data['lshow'] = Views::show('admin/lshow', [ 'clTr' => $links->clTr(), 'links' => Admin::getLinks()], false);
}else{
    if(isset($_GET['pcreate'])){
        /**
         * Добавление записи в соответсвии с атриибутами
         * Может быть список полей из таблиц
         */
        $data = [];
        if(isset($_POST['save'])){
            $people->setAttributes($_POST);
            $people->setAttributes(['password' => md5($_POST['password'])]);
            $data = $people->create();
            if(empty($data['errors'])){
                header('Location: /');
            }
        }
        $data['pcreate'] = Views::show('admin/pcreate', $data, false);
    }else{
        $data['plogin'] = Views::show('admin/plogin', [], false);
    }
}

if(isset($_GET['logout'])){
    setcookie('pid', '');
    header('Location: /');
}

if(isset($_GET['gft'])){
    $links->tlink = $_GET['gft'];
    if($rlinks = $links->find()){
        foreach($rlinks as $link){
            $links->trlink = $link['trlink']+1;
            $links->id = $link['id'];
            $links->update();
            header('Location: '.$link['olink']);
            exit;
        }
    }
}

$data['dadmin'] = Admin::getAdmin();

Views::show('wrap', $data, true);





