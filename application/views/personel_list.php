<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Listesi</title>
    <?php $this->load->view("include"); ?>
</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center">Personel Listesi</h2>
        
        <hr>
        <a href="<?php echo base_url("user/logout") ?>" class="btn btn-sm btn-dark float-right">Çıkış Yap</a>
        <?php
        $alert = $this->session->userdata("alert");
        if ($alert) { ?>
            <div class="alert <?php echo $alert["type"]; ?>" role="alert">
                <strong><?php echo $alert["title"]; ?></strong>
                <span><?php echo $alert["message"]; ?></span>
            </div>

        <?php } ?>




        <a class="btn btn-sm btn-primary" href="<?php echo base_url("personel/insert_form"); ?>">Yeni Ekle</a><br><br>


        <table class="table table-hover table-bordered table-striped" border="1">

            <thead>
                <th>#id</th>
                <th>Resim</th>
                <th>Ad Soyad
                    <a href="<?php echo base_url("personel/order/fullname/ASC") ?>">[A-z]</a>
                    <a href="<?php echo base_url("personel/order/fullname/DESC") ?>">[Z-a]</a>
                </th>
                <th>Email
                    <a href="<?php echo base_url("personel/order/email/ASC") ?>">[A-z]</a>
                    <a href="<?php echo base_url("personel/order/email/DESC") ?>">[Z-a]</a>
                </th>
                <th>Telefon
                    <a href="<?php echo base_url("personel/order/phone/ASC") ?>">[0-9]</a>
                    <a href="<?php echo base_url("personel/order/phone/DESC") ?>">[9-0]</a>
                </th>
                <th>Departman
                    <a href="<?php echo base_url("personel/order/department/ASC") ?>">[A-z]</a>
                    <a href="<?php echo base_url("personel/order/department/DESC") ?>">[Z-a]</a>
                </th>
                <th>Adres
                    <a href="<?php echo base_url("personel/order/address/ASC") ?>">[A-z]</a>
                    <a href="<?php echo base_url("personel/order/address/DESC") ?>">[Z-a]</a>
                </th>
                <th>İşlemler</th>

            </thead>

            <tbody>
                <?php foreach ($result as $person) { ?>

                    <tr>
                        <td><?php echo $person->id; ?></td>
                        <td width="40">
                            <img class="img-responsive" width="40" src="<?php echo base_url("uploads/$person->img"); ?>">
                        </td>
                        <td><?php echo $person->fullname; ?></td>
                        <td><?php echo $person->email; ?></td>
                        <td><?php echo $person->phone; ?></td>
                        <td><?php echo $person->department; ?></td>
                        <td><?php echo $person->address; ?></td>
                        <td style="width: 160px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <a class="btn btn-sm  btn-warning mx-1" href="<?php echo base_url("personel/update_form/$person->id") ?>">[Düzenle]</a>
                                </div>

                                <a class="btn btn-sm  btn-danger" href="<?php echo base_url("personel/delete/$person->id") ?>">[Sil]</a>
                            </div>




                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>

    </div>

</body>

</html>