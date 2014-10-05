<div class="row">
    <!-- Content -->
    <div id="content" class="12u skel-cell-important">
        <!-- Post -->
        <article class="is-post" style="align-content: center">
            <form method="post" action="ricerca.php" name="ricerca">
                <header>
                    <div class="row">
                        <div class="6u">
                            <h2>Ricerca</h2>
                        </div>
                        <div class="3u">
                            <a href="inserisci_libri.html.php" class="fa fa-book" title="Aggiungi">Nuovo Libro </a>
                        </div>
                        <div class="3u">
                            <a href="inserisci_modifica.html.php" class="fa fa-home" title="Aggiungi">Casa Editrice o Distributore</a>
                        </div>

                    </div>

                </header>
                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-user" style="color: #ed786a">&nbsp; Autore</h3>
                    </div>
                    <div class="3u">
                        <input id="insautore" name="insautore" placeholder="Autore" type="text" class="text" value="">
                    </div>

                    <div class="3u">
                        <h3 class="fa fa-barcode" style="color: #ed786a">&nbsp; ISBN</h3>
                    </div>
                    <div class="3u">
                        <input id="insisbn" name="insisbn" placeholder="ISBN" type="text" class="text" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-book" style="color: #ed786a">&nbsp; Titolo</h3>
                    </div>
                    <div class="3u">
                        <input id="institolo" name="institolo" placeholder="Titolo" type="text" class="text" value="">
                    </div>
                    <div class="3u">
                        <h3 class="fa fa-map-marker" style="color: #ed786a">&nbsp; Locazione</h3>
                    </div>
                    <div class="3u">
                        <input id="inslocazione" name="inslocazione" placeholder="Locazione" type="text" class="text" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-building" style="color: #ed786a">&nbsp; Casa Editrice</h3>
                    </div>
                    <div class="3u">
                        <input id="inscasaeditrice" name="inscasaeditrice" placeholder="Casa Editrice" type="text" class="text" value="">
                    </div>
                    <div class="3u">
                        <h3 class="fa fa-calendar" style="color: #ed786a">&nbsp; Anno Acquisto</h3>
                    </div>
                    <div class="3u">
                        <input id="insannoacquisto" name="insannoacquisto" placeholder="Inserisci Anno" type="text" class="text" value="">
                    </div>
                </div>
                <script type="text/javascript">
                    function submitform()
                    {
                        this.document.forms["ricerca"].submit();
                    }
                </script>
                <br>
                <ul class="actions" style="align-content: center!important">
                    <li>
                        <a href="javascript: submitform()" class="button button-icon fa fa-search">Cerca</a>
                    </li>
                </ul>
            </form>
        </article>
    </div>
</div>