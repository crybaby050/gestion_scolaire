        <div class="elems">
            <a href="<?=WEBROOT?>?page=liste"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <div class="detailTitre">
                <h3>Details</h3>
            </div>
            <div class="detEtud">
                <div class="detinfo">
                    <div class="etuInf">
                        <img src="image/schoologo.jpg" alt="" srcset="">
                    </div>
                    <div class="detOther">
                        <h2>Information de l'etudiant</h2>
                        <div class="infdet">
                            <div>Nom :<?= $detail['nom'] ?></div>
                            <div>Prenom :<?= $detail['prenom'] ?></div>
                            <div>Classe :<?= getLibelleByIdClasse($classe,$detail['idClasse']) ?></div>
                            <div>Mail :<?= $detail['email'] ?></div>
                            <div>Telephone :<?= $detail['telephone'] ?></div>
                            <div>Adresse :<?= $detail['adresse'] ?></div>    
                        </div>
                        <div class="detBouton">
                            <button><a href="<?=WEBROOT?>?page=modif&id=<?=$id?>">Modifier</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>