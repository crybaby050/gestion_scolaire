<div class="elema">
    <div class="titrea">
        <div class="tia">
            <h3>CLASSES</h3>
        </div>
        <div class="ajEtudiant">
            <button>
                <i class="fa-solid fa-plus"></i>
                <a href="<?= WEBROOT ?>?page=dashboard">Ajouter Classe</a>
            </button>
        </div>
    </div>
    <div class="tableClasse">
        <div class="filtreClasse">
            <div>
                <form action="" method="post">
                    <label for="">Filtre par niveau :</label>
                    <div class="era">
                        <select name="nive" id="">
                            <?php foreach ($niveau as $niv): ?>
                                <option><?= $niv["libelle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" name="niv"><i class="fa-solid fa-filter"></i>filtrer</button>
                </form>
            </div>
            <div>
                <form action="" method="post">
                    <label for="">Filtre par filiere :</label>
                    <div class="era">
                        <select name="fili" id="">
                            <?php foreach ($filiere as $fil): ?>
                                <option><?= $fil["libelle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" name="fil"><i class="fa-solid fa-filter"></i>filtrer</button>
                </form>
            </div>
        </div>
        <table border="1">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Filière</th>
                            <th>Niveau</th>
                            <th>Acte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= presence($classes) ?>
                        <?php foreach($classes as $classe) :?>
                            <tr>
                                <td><?= $classe['libelle'] ?></td>
                                <td><?= $classe['code'] ?></td>
                                <td><?= getLibelleByIdElement($filiere,$classe['idFiliere']) ?></td>
                                <td><?= getLibelleByIdElement($niveau,$classe['idNiveau']) ?></td>
                                <?php $id = $classe['id']?>
                                <td><a href=""><i class="fa-solid fa-pencil"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
    </div>
</div>
</body>

</html>