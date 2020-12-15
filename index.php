<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Generator rozkazów ZHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="generator.css" >
    <script src="dodawanie.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="col-12">Rozkazy</h1>
        <form>
            <fieldset class="row">
                <legend>Organizacja</legend>
                <label class="nag col-12">Podaj pełna nazwę hufca:<br>
                    <input name="hufiec" type="text" class="form-control" <?php if(isset($_POST['hufiec'])){ echo 'value="'.$_POST['hufiec'].'"';} ?>>
                </label>
                <label class="nag col-12">Podaj nazwa drużyny:<br><input name="druzyna" type="text" class="form-control" <?php if(isset($_POST['druzyna'])){ echo 'value="'.$_POST['druzyna'].'"';} ?>></label>
            </fieldset>
            <fieldset class="row">
                <legend>Podaj personalia wydającego rozkaz</legend>
                <p class="nag col-12">Podaj stopień instruktorski:</p>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="-" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='-'){echo 'checked';}} ?>> -</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="pwd" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='pwd'){echo 'checked';}} ?>>pwd</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="phm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='phm'){echo 'checked';}} ?>>phm</label>
                <label class="col-sm-6 col-md-3"><input type="radio" name="st_instr" value="hm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='hm'){echo 'checked';}} ?>>hm</label>
                <p class="nag col-12">Podaj imie i nazwisko</p>
                <label class="col-md-6"><input type="text" name="personalia" class="form-control" <?php if(isset($_POST['personalia'])){ echo 'value="'.$_POST['personalia'].'"';}?>></label>
            </fieldset>
            </form>
        <fieldset id="panel" class="row">
            <legend>Dodaj punkty do rozkazu</legend>
            <button class="col-sm-4 btn btn-info border border-primary" data-toggle="modal" data-target="#zarzadzanie_popup">Uchwały, zarządzenia, decyzje</button>
            <button class="col-sm-4 btn btn-info border border-primary">Zwolnienia</button>
            <button onclick="mianowania()" class="col-sm-4 btn btn-info border border-primary">Mianowania</button>
            <button onclick="przyznanie()" class="col-sm-4 btn btn-info border border-primary">Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów</button>
            <button onclick="kary()" class="col-sm-4 btn btn-info border border-primary">Upomnienia i kary</button>
            <button onclick="rozne()" class="col-sm-4 btn btn-info border border-primary">Różne</button>
        </fieldset>
        <div class="row" id="tresc">
            <ol>
                <li id="1" class="hidden">Uchwały, zarządzenia, decyzje</li>
                <li id="2" class="hidden">Zwolnienia</li>
                <li id="3" class="hidden">Mianowania</li>
                <li id="4" class="hidden">Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów</li>
                <li id="5" class="hidden">Upomnienia i kary</li>
                <li id="6" class="hidden">Różne</li>
            </ol>
        </div>

        <div class="modal fade" id="zarzadzanie_popup" tabindex="-1" role="dialog" aria-labelledby="zarzadzanie_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Uchwały, zarządzenia, decyzje</h4>
              </div>
              <div class="modal-body">
                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Uchwały, zarządzenia, decyzje</i></b><br><input type="text" class="col-12" id="tresc_1"></label><br><u>Przykłady:</u><br><i>
                    Uchwałą Rady Drużyny dopuszczam do złożenia Przyrzeczenia Harcerskiego następujące druhny i druhów: (…)<br>
                    Uchwałą Rady Drużyny przyjmuję do drużyny na okres próbny (skreślam ze stanu drużyny) dh ….<br>
                    Uchwałą Rady Drużyny wyrażam zgodę druhowi ćwikowi Janowi Kowalskiemu na pełnienie funkcji przybocznego w 15 Gromadzie Zuchowej "Leśne Duszki".</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="zarządzanie()">Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="zwolnienia_popup" tabindex="-1" role="dialog" aria-labelledby="zwolnienia_popup" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Uchwały, zarządzenia, decyzje</h4>
              </div>
              <div class="modal-body">

                  <label><b>Wpisz pojedyńczy punkt rozkazu o kategorii <i>Uchwały, zarządzenia, decyzje</i></b><br><input type="text" class="col-12" id="tresc_1"></label><br><u>Przykłady:</u><br><i>
                    Uchwałą Rady Drużyny dopuszczam do złożenia Przyrzeczenia Harcerskiego następujące druhny i druhów: (…)<br>
                    Uchwałą Rady Drużyny przyjmuję do drużyny na okres próbny (skreślam ze stanu drużyny) dh ….<br>
                    Uchwałą Rady Drużyny wyrażam zgodę druhowi ćwikowi Janowi Kowalskiemu na pełnienie funkcji przybocznego w 15 Gromadzie Zuchowej "Leśne Duszki".</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij okno</button>
                <button type="button" class="btn btn-success" onclick="zwolnienia()" >Dodaj do rozkazu</button>
              </div>
            </div> <!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
