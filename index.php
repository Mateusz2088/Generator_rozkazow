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
            <select name="punkt">
                <optgroup label="Wstęp">
                    <option>Wstęp okolicznościowy</option>
                    <option>Wyjątki z rozkazu jednostki nadrzędnej</option>
                </optgroup>
                <optgroup label="1. Zarządzenia i informacje">
                    <option>Zarządzenia</option>
                    <option>Informacje</option>
                </optgroup>
                <optgroup label="2. Drużyna">
                    <option>Mianowania funkcyjnych</option>
                    <option>Zwolnienia funkcyjnych</option>
                    <option>Powołania do rady drużyny</option>
                    <option>Zwolnienia z rady drużyny</option>
                </optgroup>
                <optgroup label="3. Zastępy">
                    <option>Utworzenie zastępu</option>
                    <option>Rozwiązanie zastępu</option>
                    <option>Zmiany składu zastępów</option>
                </optgroup>
                <optgroup label="4. Instrumenty metodyczne">
                    <option>Zamknięcie próby na stopień</option>
                    <option>Otwarcie próby na stopień</option>
                    <option>Zamknięcie próby na sprawność</option>
                    <option>Otwarcie próby na sprawność</option>
                    <option>Zaliczenie projektu starszoharcerskiego</option>
                    <option>Otwarcie projektu starszoharcerskiego</option>
                    <option>Otwarcie próby na znak służby</option>
                    <option>Zamknięcie próby na znak służby</option>
                    <option>Przyznanie odznak i uprawnień</option>
                    <option>Nadanie Naramiennika Wędrowniczego</option>
                    <option>Otwarcie próby wędrowniczej</option>
                    <option>Otwarcie próby harcerki/harcerza</option>
                </optgroup>
                <optgroup label="5. Sprawy członkowskie">
                    <option>Przyjęcie w poczet członków ZHP</option>
                    <option>Wystąpienie z ZHP</option>
                    <option>Skreślenie z listy członków ZHP</option>
                    <option>Ustanie członkostwa w ZHP</option>
                    <option>Zmiany przydziału służbowego i przynależności</option>
                </optgroup>
                <option><b>6. Kary organizacyjne</b></option>
                <option><b>7. Pochwały, wyróżnienia, nagrody</b></option>
                <option><b>8. Inne</b></option>
                <option><b>9. Sprostowania</b></option>
            </select>
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
