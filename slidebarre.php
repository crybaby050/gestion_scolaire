<div class="menu">
            <div class="liste">
                <div class="logo">
                    <div class="rond"></div>
                    <h2>Logo</h2>
                </div>
                <div class="lis">
                    <ul>
                        <li><i class="fas fa-home"></i><a href="?page=dashboard">ACCEUIL</a></li>
                        <li><i class="fa-solid fa-user-group"></i><a href="?page=liste">ETUDIANT</a></li>
                        <li><strong>+</strong><i class="fa-solid fa-user-group"></i><a href="?page=ajout">ADD ETUDIANT</a></li>
                        <li><i class="fa-solid fas fa-school"></i></i><a href="?page=classe">CLASSE</a></li>
                        <li><strong>+</strong><i class="fa-solid fas fa-school"></i></i><a href="?page=ajClasse">ADD CLASSE</a></li>
                        <li><i class="fa-solid fas fa-book-open"></i><a href="?page=filiere">FILIÈRE</a></li>
                        <li><i class="fa-solid fa-chart-line"></i><a href="?page=niveau">NIVEAU</a></li>
                    </ul>
                </div>
            </div>
            <div class="dec">
                <ul>
                    <li><i class="fa-solid fa-gear"></i>PARAMETRE</li>
                    <li><i class="fa-solid fa-right-to-bracket"></i><a href="<?= WEBROOT ?>?page=logout">DECONNEXION</a></li>
                </ul>
            </div>
</div>
<div class="search">
            <div class="s">
                <input type="text" placeholder="Search" class="ser">
            </div>
            <div class="r">
                <P>Bienvenue <strong><?= $nameUser['nom']  ?></strong></P>
                <i class="fa-solid fa-moon"></i>
                <i class="fa-solid fa-bell"></i>
                <div class="rond2"></div>
            </div>
</div>