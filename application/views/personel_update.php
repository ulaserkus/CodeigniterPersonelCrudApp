<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Güncelle</title>
    <?php $this->load->view("include"); ?>
</head>

<body>

    <form action=<?php echo base_url("personel/update/$row->id"); ?> method="POST"  enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Personel Ekle</h3>
                    <div class="form-group">

                        <label for="fullname">Personel Ad-Soyad</label>
                        <input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $row->fullname ?>">
                    </div>
                    <div class="form-group">

                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $row->email ?>">
                    </div>
                    <div class="form-group">

                        <label for="phone">Telefon</label>
                        <input class="form-control" type="tel" name="phone" id="phone" value="<?php echo $row->phone ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input class="form-control" type="text" name="address" id="address" value="<?php echo $row->address ?>">
                    </div>
                    <div class="form-group">
                        <label for="department">Departman</label>
                        <input class="form-control" type="text" name="department" id="department" value="<?php echo $row->department ?>">
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="img">Personel Resmi</label>
                        <input  type="file" name="img" id="img" >
                    </div>

                    <button class="btn btn-success" type="submit">Kaydet</button>
                    <a class="btn btn-danger" href="<?php echo base_url("personel") ?>">İptal</a>
                </div>
            </div>
        </div>

    </form>
</body>

</html>