@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/style.css">
        <script type="text/javascript" src="resources/js/data.js"></script>
        <script type="text/javascript" src="resources/js/functions.js"></script>
    </head>
    <body>
        <div class="container" id="container">
            <div class="row mt-2">
                <div class="col-12 mb-3">
                    <h1 class="mb-0" id="title">Bedenk een avonturier die je zou willen spelen in D&D</h1>
                </div>
            </div>
<?php 
    $races = array("Human","Elf","Half-Elf","Dwarf","Halfling","Aarakocra","Aasimar","Gnome","Dragonborn","Genasi","Goliath","Half-Orc","Tiefling");
    $classes = array("Barbarian","Bard","Cleric","Druid","Fighter","Monk","Paladin","Ranger","Rogue","Sorcerer","Warlock","Wizard");
?>
            <div id="formfields" class="row mt-4">
                <div id="formfields" class="col-12 mb-3">
                    <form action="{{ route('createbase') }}" id="form" method="post">
                        <div class="form-group">
                           @csrf
                            <div class="form-row"> 
                                <div class="col">
                                <input type="hidden" name="id">
                                    <input type="text" id="gender" name="gender" class="form-control" placeholder="Geslacht">
                                </div> 
                                <div class="col">
                                <select class="form-control" name="race" id="race">Wat is het karaker?
                                    <?php foreach($races as $race){ ?>
                                        <option value="<?php echo $race ?>"> <?php echo $race?> </option>';
                                    <?php }  
                                ?>
                                </select>
                                    <small class="form-text text-muted"><b>Informatie</b>: <a href="https://www.dndbeyond.com/sources/basic-rules/races" target="_blank">Races</a>, <a href="" target="_blank" id="raceType"></a></small>
                                </div>      
                                <div class="col">
                                    <select class="form-control" name="class" id="class">
                                        <?php foreach($classes as $class){ ?>
                                        <option value="<?php echo $class ?>"> <?php echo $class?> </option>';
                                        <?php }  
                                        ?>
                                    </select>
                                    <small class="form-text text-muted"><b>Informatie</b>: <a href="https://www.dndbeyond.com/sources/basic-rules/classes" target="_blank">Classes</a>, <a href="" target="_blank" id="classType"></a></small>
                                </div>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="name">Wat is de naam van je karakter?</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                            <small class="form-text text-muted"><b>Inspiratie</b>: <a href="#" id="namegen" target="_blank">Name generator</a></small>
                        </div>

                        <div class="form-group">
                            <label for="state">Hoe ziet je karakter er uit?</label>
                            <div class="form-row">                    
                                <div class="col">
                                    <input type="text" id="hair" name="hair" class="form-control" placeholder="Haar kleur">
                                </div>
                                <div class="col">
                                    <input type="text" id="skin" name="skin" class="form-control" placeholder="Huidskleur">
                                </div>
                                <div class="col">
                                    <input type="text" id="eyes" name="eyes"  class="form-control" placeholder="Kleur van de ogen">
                                </div>
                            </div>
                            <div class="form-row mt-2"> 
                                <div class="col">
                                    <input type="text" id="age" name="age" class="form-control" placeholder="Leeftijd (jaren)">
                                </div>
                                <div class="col">
                                    <input type="interger" id="size" name="size" class="form-control" placeholder="Lengte (cm)">
                                </div>
                                <div class="col">
                                    <input type="interger" id="weight" name="weight" class="form-control" placeholder="Gewicht (kg)">
                                </div>
                            </div>
                            <div class="form-row mt-2"> 
                                <div class="col">
                                    <textarea class="form-control" id="appearance" name="appearance" rows="3" placeholder="Andere uiterlijke kenmerken"></textarea>
                                </div>
                            </div>
                            {{-- <small class="form-text text-muted"><b>Inspiratie</b>: <a href="#" id="gimgsearch" target="_blank">Google Image Search</a>.</small> --}}
                        </div>

                        <button type="submit" class="btn btn-success float-right">Maak karakter</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            buildHiddenFields("form");

            function setGImageSearch(){
                var elm = document.getElementById('gimgsearch');
                var href = 'https://www.google.com/search?tbm=isch&as_q=';

                if(document.getElementById('gender').value.length > 0){
                    href += document.getElementById('gender').value+'+';
                }

                href += getSelectedValueFromSelect('race') + '+';
                href += getSelectedValueFromSelect('class');
                
                elm.setAttribute('href', href);
            }

            initSelect('class', classes, null, function(){
                var aElm = document.getElementById('classType');
                var selectedVal = getSelectedValueFromSelect('class');
                var selectedObj = getSelectedObjectFromSelect('class');

                aElm.innerHTML = selectedVal;
                aElm.setAttribute('href', selectedObj.info);

                setGImageSearch();
            });
            
            initSelect('race', races, null, function(){
                var aElm = document.getElementById('raceType');
                var nameGenA = document.getElementById('namegen');
                var selectedVal = getSelectedValueFromSelect('race');
                var selectedObj = getSelectedObjectFromSelect('race');

                aElm.innerHTML = selectedVal;
                aElm.setAttribute('href', selectedObj.info);
                nameGenA.setAttribute('href', selectedObj.namegen);

                setGImageSearch();
            });

            var input = document.getElementById('gender');
            input.onkeyup = setGImageSearch;

        </script>
    </body>
</html>
