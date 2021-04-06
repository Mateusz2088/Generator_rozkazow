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
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Wstęp</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Zarządzenia i informacje</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Drużyna</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Zastępy</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Instrumenty metodyczne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Sprawy członkowskie</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Kary organizacyjne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Pochwały, wyróżnienia nagrody</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Inne</button>
            <button class="col-sm-4 col-md-3 btn btn-info border border-primary" data-toggle="modal" data-target="#popup" onclick="popup(this)">Sprostowania</button>
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

        <!--okienko-->

        <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 name="title_popup" class="modal-title"></h4>
              </div>
              <div class="modal-body">
                  <select name="opcje"></select><button onclick="zamiana()" class="btn btn-info" >Zatwierdź</button>
                  <label><b>Treść:</b><br><textarea class="form-control col-12" name="tr_ppkt"></textarea></label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button id="dodaj_post_btn" type="button" class="btn btn-success" onclick="dodaj_pkt()">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- Zarządzanie okienko-->
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
