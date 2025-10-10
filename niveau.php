<div class="elema">
    <div class="filpage">
        <h3>Ajouter une nouvelle fillière</h3>
        <form action="" method="post">
            <div class="filinp">
                <div class="filab">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" id="" placeholder="Niveau" value=<?= $lib ?? "" ?>>
                    <p><?= $errors['lib'] ?? "" ?></p>
                </div>
                <!-- <div class="filab2">
                    <label for="">Description :</label>
                    <input type="text" name="desc" id="" placeholder="Description">
                </div> -->
            </div>
            <button type="submit" class="class-bouton" name="ajniv" value="">Enregistrer</button>
        </form>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Classe rattacher avec niveau</th>
            </tr>
        </thead>
        <tbody>
            <?= presence($niveau) ?>
            <?php foreach ($niveau as $niv) : ?>
                <tr>
                    <td><?= $niv['libelle'] ?></td>
                    <td>
                        <a href="">
                            <button>Voir liste</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>

</html>