        <div class="elema">
            <div class="titrea">
                <div class="tia">
                    <h3>ETUDIANTS</h3>
                </div>
                <div class="ajEtudiant">
                    <button>
                        <i class="fa-solid fa-plus"></i>
                        <a href="<?= WEBROOT ?>?page=ajout">Ajouter etudiant</a>
                    </button>
                </div>
            </div>
            <div class="tableEtudiant">
                <div class="filtrEtudiant">
                    <h3>LISTE DES ETUDIANTS</h3>
                    <div>
                        <form action="" method="post">
                            <label for="">Filtre par classe :</label>
                            <div class="er">
                                <select name="niv" id="">
                                    <?php foreach($classe as $clas):?>
                                        <option><?= $clas["libelle"] ?></option>
                                    <?php endforeach?>
                                </select>
                                <!-- <input type="text" name="niv"> -->
                            </div>
                            <button type="submit" name="nivfil"><i class="fa-solid fa-filter"></i>filtrer</button>
                            <button><a href="<?= WEBROOT ?>?page=liste" class="">rafraichir</a></button>
                        </form>
                    </div>
                </div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Classe</th>
                            <th>Telephone</th>
                            <th>Mail</th>
                            <th>Adresse</th>
                            <th>Acte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= presence($etude) ?>
                        <?php foreach($etude as $k) :?>
                            <tr>
                                <td><?= $k['nom'] ?></td>
                                <td><?= $k['prenom'] ?></td>
                                <td><?= getLibelleByIdElement($classe,$k['idClasse']) ?></td>
                                <td><?= $k['telephone'] ?></td>
                                <td><?= $k['email'] ?></td>
                                <td><?= $k['adresse'] ?></td>
                                <?php $id = $k['id']?>
                                <td><a href="<?=WEBROOT?>?page=detail&id=<?=$id?>"><i class="fa-solid fa-eye"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>