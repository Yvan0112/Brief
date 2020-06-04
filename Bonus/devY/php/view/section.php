<section class="S">
    <div id="s1">
        <h2>ACCEDEZ A VOS COMPETENCES</h2>
        
    </div>
    <div id="s2">
        <h2>CONNEXION</h2>
        <form class="ajax">
            <p>Adresse mail</p>
            <input type="email" name="email" required placeholder="">
            <p>Mot de passe</p>
            <input type="password" name="password" required placeholder="">
            <p>Mot de passe oublié?</p>
            <button>SE CONNECTER</button>
            <div class="confirmation"></div>
            <!-- ON VA DISTINGUER LES FORMULAIRES AVEC DES INFOS TECHNIQUES -->
            <input type="hidden" name="methodeApi" value="login">
        </form>
    </div>
    </section>
    <script>
// ON VA PASSER LE FORMULAIRE EN AJAX
// ON VA RANGER NOTRE CODE DANS UN OBJET => POO
var mc = {};    // mc => Mon Code

mc.start = function ()
{
    // CODE POUR INITIALISER JS SUR MA PAGE
    console.log("START EN COURS...");

    // ON VA PASSER LES FORMULAIRE QUI ONT LA CLASSE ajax EN MODE AJAX
    // (ON PEUT AVOIR PLUSIEURS FORMULAIRES SUR LA MEME PAGE =>querySelectorAll)
    var listeSelection = document.querySelectorAll('form.ajax');
    listeSelection.forEach(function (balise) {
        balise.addEventListener('submit', mc.cbAjax);
    });
}

mc.cbAjax = function (event)
{
    // BLOQUER LE FORMULAIRE CLASSIQUE
    event.preventDefault();
    console.log("FORMULAIRE AN AJAX...");

    // ON PEUT ENVOYER LES INFOS DU FORMULAIRE EN AJAX
    var formulaire = event.target;
    var formData = new FormData(formulaire); // ASPIRE LES INFOS DU FORMULAIRE

    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(function(reponseServeur){
        return reponseServeur.json();
    })
    .then(function (json) {
        console.log(json);

        // JE PEUX RECUPERER LA CLE API
        if ('cleApi' in json)
        {
            // ON VA LE MEMORISER DANS sessionStorage
            // POUR POUVOIR LE REUTILISER SUR LA PAGE admin
            sessionStorage.setItem('cleApi', json.cleApi);
        }

    });
}

// ET ON APPELLE LA METHODE
mc.start();

        </script>