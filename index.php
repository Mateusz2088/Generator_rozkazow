<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Generator rozkazów ZHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="generator.css" >
</head>
<body>
    <div class="container">
        <h1 class="col-12">Rozkazy</h1>
        <form>
            <fieldset class="row">
                <legend>Organizacja</legend>
                <label class="col-12">Podaj pełna nazwę hufca:<br>
                    <input name="hufiec" type="text" class="form-control" <?php if(isset($_POST['hufiec'])){ echo 'value="'.$_POST['hufiec'].'"';} ?>>
                </label>
                <label class="col-12">Podaj nazwa drużyny:<br><input name="hufiec" type="text" class="form-control" <?php if(isset($_POST['druzyna'])){ echo 'value="'.$_POST['druzyna'].'"';} ?>></label>
            </fieldset>
            <fieldset class="row">
                <legend>Podaj personalia wydającego rozkaz</legend>
                <p class="col-12">Podaj stopień instruktorski:</p>
                <label class="col-md-3"><input type="radio" name="st_instr" value="-" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='-'){echo 'checked';}} ?>> -</label>
                <label class="col-md-3"><input type="radio" name="st_instr" value="pwd" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='pwd'){echo 'checked';}} ?>>pwd</label>
                <label class="col-md-3"><input type="radio" name="st_instr" value="phm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='phm'){echo 'checked';}} ?>>phm</label>
                <label class="col-md-3"><input type="radio" name="st_instr" value="hm" <?php if(isset($_POST['stopien'])){if($_POST['stopien']=='hm'){echo 'checked';}} ?>>hm</label>
                <p class="col-12">Podaj imie i nazwisko</p>
                <label class="col-md-6"><input type="text" name="imie" class="form-control" <?php if(isset($_POST['personalia'])){ echo 'value="'.$_POST['personalia'].'"';}?>></label>
            </fieldset>
            <fieldset id="panel" class="row">
                <legend>Dodaj punkty do rozkazu</legend>
                <button onclick="zarządzanie()" class="col-sm-4 btn btn-info border border-primary">Uchwały, zarządzenia, decyzje</button>
                <button onclick="zwolnienia()" class="col-sm-4 btn btn-info border border-primary">Zwolnienia</button>
                <button onclick="mianowania()" class="col-sm-4 btn btn-info border border-primary">Mianowania</button>
                <button onclick="przyznanie()" class="col-sm-4 btn btn-info border border-primary">Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów</button>
                <button onclick="kary()" class="col-sm-4 btn btn-info border border-primary">Upomnienia i kary</button>
                <button onclick="rozne()" class="col-sm-4 btn btn-info border border-primary">Różne</button>
            </fieldset>
        </form>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>