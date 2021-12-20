<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleBoot.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bibi CamCam</title>
</head>

<body>
    <div id="content-main">
        
            <h1>La vie de CamCam</h1>
        

        <!-- Contenair Input -->
        <div id="input-contenair">
            <form action="index.php" method="post">

                <div class="form-floating padding10">
                    <select name="type" class="form-select" id="inputChoice" aria-label="Sélectionnez un élément" required>
                        <option selected>Choississez</option>
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
                    <input type="tel" class="form-control" placeholder="en ml" id="inputQty" name="qty" pattern="\d*"></input> <!-- si fonctionne pas sur tel, changer type="number" min="0" -->
                    <label for="inputQty">Quantité: (en ml)</label>
                </div>

                <div class="center" id="inputSubmit">
                    <input type="submit" value="Ajouter" class="btn btn-secondary btn-lg">
                </div>

            </form>
        </div>
        <!-- FIN Contenair Input -->

        <!-- Contenair Tab -->
        <div class="d-flex flex-column align-items-center">

            <table class="table w-75 ">
                <h3>&#x1F37C; Ses derniers <strong>Bibi:</strong></h3>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <?php
                while ($sqlBibiResp = $sqlBibiStm->fetch()) {
                ?>
                <tbody id="tbodyBibi" class="table-primary">
                    <th><?php echo $sqlBibiResp['id'] ?></th>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($sqlBibiResp['date'])) ?></td>
                    <td><?php echo $sqlBibiResp['qty'] ?></td>
                </tbody>
                <?php
                }
                ?>
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
                while ($sqlPipiResp = $sqlPipiStm->fetch()) {
                ?>
                    <tbody id="tbodyPipi" class="table-warning">
                        <th><?php echo $sqlPipiResp['id'] ?></th>
                        <td><?php echo $sqlPipiResp['date'] ?></td>
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
                <?php
                while ($sqlPopoResp = $sqlPopoStm->fetch()){
                ?>   
                
                <tbody id="tbodyPopo" class="table-danger">
                    <th><?php echo $sqlPopoResp['id'] ?></th>
                    <td><?php echo $sqlPopoResp['date'] ?></td>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- FIN Contenair Tab -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>