<?php

##Определяем константы
define('USERS_TABLE','users');
define('SID',session_id());


##Определяем функции
//Функция выхода.
//Пользователь считается авторизированым, если в сессии присутствует uid
//см. "Действия - если пользователь авторизирован".
function logout() {
    unset($_SESSION['id_user']); //Удаляем из сессии ID пользователя
    die(header('Location: '.$_SERVER['PHP_SELF']));
}

//Функция входа.
//Все выбраные поля записываются в сессию.
//Таким образом, при каждом просмотре страницы не надо выбирать их заново.
//Для обновления информации из БД можно пользоваться этой же функцией - имя и пароль
//хранятся в сессиях
function login($username,$password)    {
    $link = mysqli_connect("localhost","root","","auto_prokat");
    $result = mysqli_query($link, "SELECT * FROM `".USERS_TABLE."` WHERE `Login`='$username' AND `Password`='$password';")
    or die(mysqli_error($link));
    $USER = mysql_fetch_array($result,1); //Генерирует удобный массив из результата запроса
    if(!empty($USER)) { //Если массив не пустой (это значит, что пара имя/пароль верная)
        $_SESSION = array_merge($_SESSION,$USER); //Добавляем массив с пользователем к массиву сессии

        mysqli_query($link, "UPDATE `".USERS_TABLE."` SET `sid`='".SID."' WHERE `id_user`='".$USER['id_user']."';")
        or die(mysqli_error($link));
        return true;
    }
    else {
        return false;
    }
}

//Функция проверки залогинности пользователя.
//При входе, ID сессии записывается в БД.
//Если ID текущей сессии и SID из БД не совпадают, производится logout.
//Благородя этому нельзя одновременно работать под одним ником с разных браузеров.
function check_user($id_user) {
    $result = mysql_query("SELECT `sid` FROM `".USERS_TABLE."` WHERE `id_user`='$id_user';") or die(mysql_error());
    $sid = mysql_result($result,0);
    return $sid==SID ? true : false;
}

##Действия - если пользователь авторизирован
if(isset($_SESSION['id_user'])) { //Если была произведена авторизация, то в сессии есть uid

    //Константу удобно проверять в любом месте скрипта
    define('USER_LOGGED',true);
    //Создаём удобные переменные
    //Все поля таблицы пользователей записываются в сесси (см. стр. 35-37)
    //Таким образом, после добавления нового поля в таблицу надо дописть лишь одну строку
    $UserName = $_SESSION['Login'];
    $UserPass = $_SESSION['Password'];
    $UserID = $_SESSION['id_user'];
}
else {
    define('USER_LOGGED',false);
}

##Действия при попытке входа
if (isset($_POST['login'])) {

    if(get_magic_quotes_gpc()) { //Если слеши автоматически добавляются
        $_POST['user']=stripslashes($_POST['user']);
        $_POST['pass']=stripslashes($_POST['pass']);
    }
    $user = mysql_real_escape_string($_POST['user']);
    $pass = mysql_real_escape_string($_POST['pass']);
    if(login($user,$pass)) {
        header('Refresh: 3');
        die('Вы успешно авторизировались!');
    }
    else {
        header('Refresh: 3;');
        die('Пароль неправильный!');
    }

}

##Действия при попытке выхода
if(isset($_GET['logout'])) {
    logout();
}
?>