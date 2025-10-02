        <div class="elems">
            <a href="<?=WEBROOT?>?page=liste"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <div class="detailTitre">
                <h3>Modification</h3>
            </div>
            <div class="formodif">
                <form action="" method="post">
                    <h3>Modifier</h3>
                    <div>
                        <label for="">Nom</label>
                        <input type="text" name="nom" value=<?=$lib ?? ""?>>
                        <p><?=$error1?></p>
                    </div>
                    <div>
                        <label for="">Prenom</label>
                        <input type="text" name="pre" value=<?=$pre ?? ""?>>
                        <p><?=$error2?></p>
                    </div>
                    <div>
                        <label for="">Mail</label>
                        <input type="text" name="mail" value=<?=$mail ?? ""?>>
                    </div>
                    <div>
                        <label for="">class</label>
                        <select  id="" name="class">
                            <?php foreach($classe as $k): ?>
                                <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="">Tel</label>
                        <input type="number" name="tel" id="" value=<?=$tel ?? ""?>>
                    </div>
                    <div>
                        <label for="">Adresse</label>
                        <input type="text" name="ad" value=<?=$ad ?? ""?>>
                        <p><?=$error4?></p>
                    </div>
                    <button type="submit" name="modSave">Enregistrer</button>
                </form>
            </div>
        </div>
</body>
</html>