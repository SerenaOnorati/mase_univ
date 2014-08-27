<div class="row">
    <!-- Content -->
    <div id="content" class="12u skel-cell-important">

        <!-- Post -->
        <article class="is-post" style="align-content: center">
            <form method="post" action="" name="ricerca" id="ricerca" target="_parent" onsubmit="return false" >
                <header>
                    <div><br><h2>Ricerca</h2></div>
                </header>
                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-user" style="color: #ed786a">Autore</h3>
                    </div>
                    <div class="3u">
                        <input id="insautore" name="insautore" placeholder="Inserisci Autore" type="text" class="text"">
                    </div>

                    <div class="3u">
                        <h3 class="fa fa-barcode" style="color: #ed786a">ISBN</h3>
                    </div>
                    <div class="3u">
                        <input id="insisbn" name="institolo" placeholder="Inserisci ISBN" type="text" class="text">
                    </div>
                </div>

                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-book" style="color: #ed786a">Titolo</h3>
                    </div>
                    <div class="3u">
                        <input id="institolo" name="insautore" placeholder="Inserisci Titolo" type="text" class="text"">
                    </div>

                    <div class="3u">
                        <h3 class="fa fa-map-marker" style="color: #ed786a">Locazione</h3>
                    </div>
                    <div class="3u">
                        <input id="inslocazione" name="institolo" placeholder="Inserisci Locazione" type="text" class="text">
                    </div>
                </div>
                <div class="row">
                    <div class="3u">
                        <h3 class="fa fa-building" style="color: #ed786a">Casa Editrice</h3>
                    </div>
                    <div class="3u">
                        <input id="inscasaeditrice" name="insautore" placeholder="Inserisci Casa Editrice" type="text" class="text"">
                    </div>

                    <div class="3u">
                        <h3 class="fa fa-calendar" style="color: #ed786a">Anno Acquisto</h3>
                    </div>
                    <div class="3u">
                        <input id="insannoacquisto" name="insannoacquisto" placeholder="Inserisci Anno" type="text" class="text">
                    </div>
                </div>


                <div class="row" style="align-content: center !important">
                   <div class="12u" >
                       <button id="ricerca" class="button button-icon fa fa-search" onclick="ricerca()">Ricerca</button>
                   </div>
                </div>
            </form>
        </article>
    </div>
</div>