<?php
ob_start();
require_once('fonction.php');
// require_once('login.php');
define("WEBROOT", "http://localhost:8000/");
if (isset($_REQUEST['page'])) {
    if (!isset($_SESSION["userConnect"])) {
        header("location:" . WEBROOT);
        exit;
    } 
    $nameUser = $_SESSION['userConnect'];
    $page = $_REQUEST['page'];
    require_once('tete.php');
    require_once('slidebarre.php');
    switch ($page) {
        case 'dashboard':
            $etude = findAllEtudiant();
            $classe = findAllClasse();
            $filiere = findAllFilliere();
            $niveau = findAllNiveau();
            $nbEtudiants = compteur($etude);
            $nbClasse = compteur($classe);
            $nbFilliere = compteur($filiere);
            $nbNiveau = compteur($niveau);
            require_once('dashboard.php');
            break;
        case 'liste':
            $etude = findAllEtudiant();
            $test = findAllEtudiant();
            $niveau = findAllNiveau();
            $classe=findAllClasse();
            $error = '';
            if(isset($_REQUEST['nivfil'])){
                $val = trim($_REQUEST['niv']);
                if(empty($val)){
                    $error = 'Champ obligatoire';
                }else{
                    $etude = filteredByClasse($val,$etude,$classe);
                    require_once('liste.php');
                }
            }
            require_once('liste.php');
            break;
        case 'logout':
            session_unset(); 
            session_destroy(); 
            header("location:" . WEBROOT); 
        exit;
        break;
        case 'detail':
            $classe=findAllClasse();
            $detail = [];
            if(isset($_REQUEST['id'])){
                $id=intval($_REQUEST['id']);
                $detail = detailById($id);
            }
            require_once('detail.php');
        break;
        case 'ajetu' :
            require_once('ajoutEtudiant.php');
        break;
        case 'modif':
            $classe=findAllClasse();
            $error1="";
            $error2="";
            $error3="";
            $error4="";
            if(isset($_REQUEST['modSave'])){
                $lib = trim($_REQUEST['nom']);
                $pre = trim($_REQUEST['pre']);
                $clas = trim($_REQUEST['class']);
                $mail = trim($_REQUEST['mail']);
                $tel = trim($_REQUEST['tel']);
                $ad = trim($_REQUEST['ad']);
                $verif=true;
                if(empty($lib)){
                    $error1="champ obligatoire";
                    $verif=false;
                }
                if(empty($pre)){
                    $error2="champ obligatoire";
                    $verif=false;
                }
                if(empty($clas)){
                    $error3="champ obligatoire";
                    $verif=false;
                }
                if(empty($mail)){
                    $mail = "Aucun";
                    $verif=true;
                }
                if(empty($tel)){
                    $tel = "Auncun";
                    $verif=true;
                }
                if(empty($ad)){
                    $error4="champ obligatoire";
                    $verif=false;
                }
                if($verif === true){
                    $modif=[
                        'id'=>$_REQUEST['id'],
                        'nom'=>$_REQUEST['nom'],
                        'prenom'=>$_REQUEST['pre'],
                        'idClasse'=>(int)$_REQUEST['class'],
                        'email'=>$_REQUEST['mail'],
                        'telephone'=>$_REQUEST['tel'],
                        'adresse'=>$_REQUEST['ad']
                    ];
                    dd($modif);
                    modifierById($modif);
                    header("Location:".WEBROOT."?page=liste");
                    exit;
                }
            }
            // if(isset($_REQUEST['id'])){
            //     $id = intval($_REQUEST['id']);
            //     $detail=detailById($id);
            // }
            require_once('modif.php');
        break;
        default:
            break;
    }
}else{
    if (isset($_SESSION["userConnect"])) {
        header("location:" . WEBROOT . "?page=dashboard");
        exit;
    }
    $errorLogin = "";
    $errorPwd = "";
    $errorConnect = "";
    if (isset($_REQUEST["connect"])) {
        $login = trim($_REQUEST["mail"]);
        $pwd = trim($_REQUEST["mdp"]);
        $verification = true;
        if (empty($login)) {
            $errorLogin = "Login obligatoire";
            $verification = false;
        }
        if (empty($pwd)) {
            $errorPwd = "Mot de passe obligatoire";
            $verification = false;
        }
        if ($verification) {
            $user = findUserConnect($login, $pwd);
            if (!empty($user)) {
                $_SESSION["userConnect"] = $user;
                header('location:' . WEBROOT . '?page=dashboard');
            } else {
                $errorConnect = "Login ou mot de passe incorrect";
            }
        }
    }
    require_once("login.php");
}
ob_end_flush();
