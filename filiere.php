<div class="elema">
    <div class="filpage">
        <h3>Ajouter une nouvelle fillière</h3>
        <form action="" method="post">
            <div class="filinp">
                <div class="filab">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" id="" placeholder="Fillière" value=<?= $lib ?? "" ?>>
                    <p><?= $errors['lib'] ?? "" ?></p>
                </div>
                <!-- <div class="filab2">
                    <label for="">Description :</label>
                    <input type="text" name="desc" id="" placeholder="Description">
                </div> -->
            </div>
            <button type="submit" class="class-bouton" name="ajfil" value="">Enregistrer</button>
        </form>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Classe rattaché avec filiere</th>
            </tr>
        </thead>
        <tbody>
            <?= presence($filiere) ?>
            <?php foreach ($filiere as $filier) : ?>
                <tr>
                    <td><?= $filier['libelle'] ?></td>
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