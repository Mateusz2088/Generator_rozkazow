<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Generator rozkazów ZHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="generator.css" >
    <script src="punkty.js"></script>
    <script src="pdf_gen.js"></script>
    <script src="frazy.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="col-12">Rozkazy</h1>
        <form>
            <fieldset class="row">
            <legend>Podstawowe dane</legend>
                <label class="nag col-12">Podaj numer rozkazu <input class="col-12" type="text" placeholder="np. L5" name="nr" <?php if(isset($_POST['nr'])){ echo 'value="'.$_POST['nr'].'"';} ?>></label>
                <label class="nag col-12">Podaj rok wydania rozkazu <input class="col-12" type="number" min="1900" max="2099" step="1" name="rok" <?php if(isset($_POST['rok'])){ echo 'value="'.$_POST['rok'].'"';} ?>></label>
                <label class="nag col-12">Podaj datę opublikowania rozkazu <input class="col-12" type="date" name="data" <?php if(isset($_POST['data'])){ echo 'value="'.$_POST['data'].'"';} ?>></label>
                <label class="nag col-12">Podaj miejscowość wydania rozkazu <input class="col-12" type="text" name="miejsce" <?php if(isset($_POST['miejsce'])){ echo 'value="'.$_POST['miejsce'].'"';} ?>></label>
            </fieldset>
            <fieldset class="row">
                <legend>Organizacja</legend>
                <label class="nag col-12">Podaj pełna nazwę hufca:<br>
                    <input name="hufiec" type="text" class="form-control" <?php if(isset($_POST['hufiec'])){ echo 'value="'.$_POST['hufiec'].'"';} ?>>
                </label>
                <label class="nag col-12">Podaj nazwę drużyny:<br><input name="druzyna" type="text" class="form-control" <?php if(isset($_POST['druzyna'])){ echo 'value="'.$_POST['druzyna'].'"';} ?>></label>
            </fieldset>
            <fieldset class="row">
                <legend>Podaj personalia wydającego rozkaz</legend>
                <p class="nag col-12">Podaj stopień instruktorski:</p>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='-'){echo 'checked';}} ?>> -</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="pwd" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='pwd'){echo 'checked';}} ?>>pwd</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="phm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='phm'){echo 'checked';}} ?>>phm</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="hm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='hm'){echo 'checked';}} ?>>hm</label>
                <p class="nag col-12">Podaj imie i nazwisko</p>
                <label class="col-md-6"><input type="text" name="personalia" class="form-control" <?php if(isset($_POST['personalia'])){ echo 'value="'.$_POST['personalia'].'"';}?>></label>
            </fieldset>
            </form>
        <fieldset id="panel" class="row">
            <legend>Dodaj punkty do rozkazu</legend>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#wstep_popup">Wstęp</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#zarzadzanie_popup">Zarządzenia i informacje</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#zwolnienia_popup">Drużyna</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#mianowania_popup">Zastępy</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#przyznanie_popup">Instrumenty metodyczne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#nagrody_popup">Sprawy członkowskie</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#upomnienia_popup">Kary organizacyjne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#rozne_popup">Pochwały, wyróżnienia nagrody</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#rozne_popup">Inne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#rozne_popup">Inne</button>
            <button class="col-sm-4 col-md-6 btn btn-success border border-primary" onclick="Export2Doc('exportContent');">Wygeneruj plik .doc</button>
        </fieldset>
        <h3>Treść dokumentu</h3>
        <!-- Treść rozkazu -->

        <div class="row" id="dokument">
            <div class="blok">
                <div style="text-align: right" id="head_r"></div>
                <div id="head_l"></div>
            </div>
            <h1 class="blok" style="text-align: centre" id="nr_roz"></h1>
            <div class="row blok" id="tresc">
                <div class="col-12" id="0"></div>
                <div class="col-12" id="1"></div>
                <div class="col-12" id="2"></div>
                <div class="col-12" id="3"></div>
                <div class="col-12" id="4"></div>
                <div class="col-12" id="5"></div>
                <div class="col-12" id="6"></div>
                <div class="col-12" id="7"></div>
            </div>
            <div class="blok">
            <p class="right" style="text-align: right" id="podpis"></p>
            </div>
        </div>

        <!-- Wstęp okienko-->

        <div class="modal fade" id="wstep_popup" tabindex="-1" role="dialog" aria-labelledby="wstep_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Wstęp</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz poniżej wstęp do rozkazu:</b><br><textarea class="form-control col-12" name="tr_ppkt"></textarea></label>
                      <br><u>Zasady:</u><br><i>
                    Rozkaz może poprzedzać wstęp okolicznościowy.<br>
                    Wyjątki z rozkazu jednostki nadrzędnej (przed rozkazem odczytujemy te wyjątki z rozkazów jednostek nadrzędnych, które dotyczą drużyny).
                    </i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(0,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- Zarządzanie okienko-->

        <div class="modal fade" id="zarzadzanie_popup" tabindex="-1" role="dialog" aria-labelledby="zarzadzanie_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Uchwały, zarządzenia, decyzje</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Uchwały, zarządzenia, decyzje</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Uchwałą Rady Drużyny dopuszczam do złożenia Przyrzeczenia Harcerskiego następujące druhny i druhów: (…)<br>
                    Uchwałą Rady Drużyny przyjmuję do drużyny na okres próbny (skreślam ze stanu drużyny) dh ….<br>
                    Uchwałą Rady Drużyny wyrażam zgodę druhowi ćwikowi Janowi Kowalskiemu na pełnienie funkcji przybocznego w 15 Gromadzie Zuchowej "Leśne Duszki".</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(1,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Zwolnienia okienko-->
        <div class="modal fade" id="zwolnienia_popup" tabindex="-1" role="dialog" aria-labelledby="zwolnienia_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Zwolnienia</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Zwolnienia</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Na wniosek Rady Drużyny zwalniam z członkostwa w niej druha ćwika Jana Kowalskiego<br>
                   Zwalniam z funkcji zastępowego zastępu "Szkwał" druha wyw. Tomasza Nowaka.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(2,0)" >Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Mianowania okienko-->

        <div class="modal fade" id="mianowania_popup" tabindex="-1" role="dialog" aria-labelledby="mianowania_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Mianowania</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Mianowania</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Na wniosek Rady Drużyny powołuję na członka tej rady druha Piotra Osińskiego.<br>
                    Na wniosek zastępu ,,Szkwał" mianuję druha Piotra Osińskiego zastępowym wymienionego zastępu.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(3,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Przyznanie okienko-->

        <div class="modal fade" id="przyznanie_popup" tabindex="-1" role="dialog" aria-labelledby="przyznanie_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Otwieram próby na stopnie młodzika druhom: Pawłowi Omega, Adamowi Alfa.<br>
                    Na wniosek Rady Drużyny przyznaje stopień wywiadowcy druhowi Michałowi Kowalskiemu.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(4,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Nagrody i wyróżnienia okienko-->

        <div class="modal fade" id="nagrody_popup" tabindex="-1" role="dialog" aria-labelledby="nagrody_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Nagrody i wyróżnienia</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Nagrody i wyróżnienia</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Na wniosek Rady Drużyny udzielam pochwały zastępowi "Sztorm" za zorganizowanie balu andrzejkowego.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(5,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Upomnienia i kary okienko-->

        <div class="modal fade" id="upomnienia_popup" tabindex="-1" role="dialog" aria-labelledby="upomnienia_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Upomnienia i kary</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Upomnienia i kary</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Na wniosek Rady Drużyny udzielam upomnienia druhowi Janowi Kowalskiemu za niewykonanie zadania wyznaczonego przez radę drużyny.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(6,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <!-- Różne okienko-->

        <div class="modal fade" id="rozne_popup" tabindex="-1" role="dialog" aria-labelledby="rozne_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Różne</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Różne</i></b><br><input type="text" class="col-12" name="tr_ppkt"></label><br><u>Przykłady:</u><br><i>
                    Przypominam, że 3 października mija termin zgłaszania na Hufcowy Kurs Zastępowych.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="dodaj_pkt(7,0)">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
