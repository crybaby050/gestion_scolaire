<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // session_unset();
}
function jsonToArray():array{
    $json = file_get_contents('data.json');
    $datas = json_decode($json,true);
    if(empty($datas)){
        return [];
    }else{
        return $datas;
    }
}
function arrayToJson($data):void{
    $json = json_encode($data);
    file_put_contents('data.json',$json);
}
function findAllEtudiant():array{
    $datas=jsonToArray();
    return $datas['etudiant'];
}
function findAllClasse():array{
    $datas=jsonToArray();
    return $datas['classe'];
}
function findAllFilliere():array{
    $datas=jsonToArray();
    return $datas['filiere'];
}
function findAllNiveau():array{
    $datas=jsonToArray();
    return $datas['niveau'];
}
function findAllUsers():array{
    $datas=jsonToArray();
    return $datas['users'];
}
function compteur($table):int{
    return count($table);
}
function nouveauId(array $tableau): int {
    $id=[];
    if (empty($tableau)) {
        return 1;
    }else{
        foreach($tableau as $tab){
            $id[]=$tab['id'];
        }
    }
    return max($id) + 1;
}
function ajouter($newEtude,string $a):void{
    $datas = jsonToArray();
    array_push($datas[$a],$newEtude);
    arrayToJson($datas);
}
function tri(array $tab,string $valeur,$cle):array{
    $tabNiveau = [];
    foreach($tab as $key){
        if($key[$cle] == $valeur){
            $tabNiveau[] = $key;
        }
    }
    return $tabNiveau;
}
function findUserConnect(string $login, string $mdp): array{
    $users=findAllUsers();
    foreach ($users as $user) {
        if ($user["mail"] === $login && $user["mdp"] === $mdp) {
            return $user;
        }
    }
    return [];
}
function presence($tab):void{
    if(count($tab)==0){
        echo "<h3> Auncun element enregistrer</h3>";
    }
}
function detailById($id): array {
    $tab = findAllEtudiant();
    foreach ($tab as $v) {
        if ($v['id'] == $id) {
            return $v;
        }
    }
    return [];
}
function modifierById($modif): void {
    $datas = jsonToArray();
    foreach ($datas['etudiant'] as $index => $mod) {
        if ((int)$mod['id'] === (int)$modif['id']) {
            $datas['etudiant'][$index] = $modif;
            arrayToJson($datas);
            return; // sortie dès que modif faite
        }
    }
}
function dd(mixed $data): void {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
function getLibelleByIdElement($elem,$id){
    foreach ($elem as $c) {
        if($c["id"] == $id){
            return $c["libelle"];
        }
    }
}
function getClasseByLibelle($classes,$libelle){
    foreach ($classes as $c) {
        if($c["libelle"] == $libelle){
            return $c;
        }
    }
}
function getEtudiantByClasse($etudiants, $classe){
    $etus = [];
    foreach ($etudiants as $e) {
        if($e["idClasse"] == $classe["id"]){
            $etus[] = $e;
        }
    }
    return $etus;
}
function getNiveauByLibelle($niveau,$libelle){
    foreach($niveau as $n){
        if($n["libelle"] == $libelle){
            return $n;
        }
    }
}
function getFiliereByLibelle($filiere,$libelle){
    foreach($filiere as $n){
        if($n["libelle"] == $libelle){
            return $n;
        }
    }
}
function getClasseByNiveau($classe,$niveau){
    $clas=[];
    foreach($classe as $c){
        if($c['idNiveau'] == $niveau['id']){
            $clas[] = $c;
        }
    }
    return $clas;
}
function getClasseByFiliere($classe,$filiere){
    $clas=[];
    foreach($classe as $c){
        if($c['idFiliere'] == $filiere['id']){
            $clas[] = $c;
        }
    }
    return $clas;
}
function filteredByClasse($libelle, $etudiants,$classes){
    $classe = getClasseByLibelle($classes,$libelle);
    $etus = getEtudiantByClasse($etudiants,$classe);
    return $etus;
}
function filterByNiveau($niveau,$libelle,$classe){
    $niveau = getNiveauByLibelle($niveau,$libelle);
    $clas = getClasseByNiveau($classe,$niveau);
    return $clas;
}
function filterByFiliere($filieres,$libelle,$classe){
    $filiere = getNiveauByLibelle($filieres,$libelle);
    $clas = getClasseByNiveau($classe,$filiere);
    return $clas;
}
function verificationUnicite(mixed $data,string $a):bool{
    $etudes=findAllEtudiant();
    foreach($etudes as $etude){
        if($etude[$a]==$data){
            return false;
        }
    }
    return true;
}
function verificationUniciteOnClasse(mixed $data,string $a):bool{
    $classes=findAllClasse();
    foreach($classes as $classe){
        if($classe[$a] == $data){
            return false;
        }
    }
    return true;
}
function verificationUniciteOnNiveau(mixed $data,string $a):bool{
    $niveaux=findAllNiveau();
    foreach($niveaux as $niveau){
        if($niveau[$a] == $data){
            return false;
        }
    }
    return true;
}
function verificationUniciteOnFiliere(mixed $data,string $a):bool{
    $filieres=findAllFilliere();
    foreach($filieres as $filiere){
        if($filiere[$a] == $data){
            return false;
        }
    }
    return true;
}