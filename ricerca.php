<div class="row">

    <!-- Content -->
    <div id="content" class="12u skel-cell-important">

        <!-- Post -->
        <article class="is-post" style="align-content: center">
            <form method="get" action="" name="dati_utente" id="dati_utente" target="_parent" onsubmit="return false" >
                <header>
                    <div><br><h2>Ricerca</h2></div>
                </header>
                <div class="row">
                    <div class="6u">
                        <h3 class="fa fa-user" style="color: #ed786a">Ricerca per Autore</h3>
                    </div>
                    <div class="6u">
                        <h3 class="fa fa-book" style="color: #ed786a">Ricerca per Titolo</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="6u">
                        <input id="insautore" name="insautore" placeholder="Inserisci Autore" type="text" class="text"">
                        <br>
                        <a href="" class="fa fa-search">Cerca</a>
                    </div>
                    <div class="6u">
                        <input id="institolo" name="institolo" placeholder="Inserisci Titolo" type="text" class="text">
                        <br>
                        <a href="" class="fa fa-search">Cerca</a>
                    </div>
                </div>
                <br>
                <br>

                <?php
                    if(userHasRole('Amministratore'))
                    {
                            echo "<div class=\"row\">
                            <div class=\"6u\">
                                <h3 class=\"fa fa-map-marker\" style=\"color: #ed786a\">Ricerca per Locazione</h3>
                            </div>
                            <div class=\"6u\">
                                <h3 class=\"fa fa-building\" style=\"color: #ed786a\">Ricerca per Casa Editrice</h3>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"6u\">
                                <input id=\"inslocazione\" name=\"inslocazione\" placeholder=\"Inserisci Locazione\" type=\"text\" class=\"text\">
                                <br>
                                <a href=\"\" class=\"fa fa-search\">Cerca</a>
                            </div>
                            <div class=\"6u\">
                                <input id=\"inscasaeditrice\" name=\"inscasaeditrice\" placeholder=\"Inserisci Casa Editrice\" type=\"text\" class=\"text\">
                                <br>
                                <a href=\"\" class=\"fa fa-search\">Cerca</a>
                            </div>
                        </div>";
                    }
                ?>
            </form>
        </article>
    </div>
</div>