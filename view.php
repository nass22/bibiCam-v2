<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleBoot.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bibi CamCam</title>
</head>

<body>
    <div id="content-main">
        <div class="header">
            <h1>La vie de CamCam</h1>
        </div>
    
<!-- Contenair Input -->
        <div id="input-contenair">
            <form action="view.php" method="post">

                <div class="form-floating padding10">
                    <select name="type" class="form-select" id="inputChoice" aria-label="Sélectionnez un élément" required>
                        <option value="bibi">Bibi</option>
                        <option value="pipi">Pipi</option>
                        <option value="popo">Popo</option>
                    </select>
                    <label for="inputChoice">Choix Bibi, Pipi ou Popo:</label>
                </div>

                <div class="form-floating padding10">
                    <input type="datetime-local" name="date" class="form-control" id="inputDate"></input>
                    <label for="date">Date & Heure:</label>
                </div>

                <div class="form-floating padding10">
                    <input type="number" min="0" class="form-control" placeholder="en ml" id="inputQty" name="qty" pattern="\d*"></input>
                    <label for="inputQty">Quantité: (en ml)</label>
                </div>

                <div class="center" id="inputSubmit">
                    <button type="button" class="btn btn-secondary btn-lg">Ajouter</button>
                </div>
            </form>
        </div>
<!-- FIN Contenair Input -->

<!-- Contenair Tab -->
        <div class="contenair d-flex">
            
            <table class="table w-75" >
            <h3>&#x1F37C; Ses derniers <strong>Bibi:</strong></h3>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody id="tbodyBibi">
                    <th>1</th>
                    <td>test</td>
                    <td>test</td>
                </tbody>
            </table>

            
            <table class="table w-75">
            <h3>&#x1F6BA; Ses derniers <strong>Pipi:</strong></h3>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                
                    <?php
                        while($sqlResp=$sqlStm->fetch()){
                    ?>
                        <tbody id="tbodyPipi">
                            <th><?php echo $sqlResp['id'] ?></th>
                            <td><?php echo $sqlResp['date'] ?></td>
                        </tbody>   
                    <?php
                        }
                    ?>    
                    
                
            </table>

            
            <table class="table w-75">
            <h3>&#x1F4A9; Ses derniers <strong>Popo:</strong></h3>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody id="tbodyPopo">
                    <th>1</th>
                    <td>test</td>
                </tbody>
            </table>
        </div>
<!-- FIN Contenair Tab -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>