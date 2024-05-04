<?php
    session_start();
    require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Siswa Kursus</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            padding-top: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .btn-add {
            background-color: #0d6e;
            border-color: #0d6efd;
        }
        .btn-add:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Daftar Siswa Kursus
                        <a href="student-create.php" class="btn btn-add float-end">Tambahkan Siswa Kursus</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center>NO</center></th>
                                    <th><center>Nama</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>No HP</center></th>
                                    <th><center>Kursus</center></th>
                                    <th><center>Alamat</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM student";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><center><?= $student['id']; ?></center></td>
                                                <td><center><?= $student['name']; ?></center></td>
                                                <td><center><?= $student['email']; ?></center></td>
                                                <td><center><?= $student['phone']; ?></center></td>
                                                <td><center><?= $student['course']; ?></center></td>
                                                <td><center><?= $student['address']; ?></center></td>
                                                <td>
                                                    <center>
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </center>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td colspan='7'><h5 class='text-center'> No Record Found </h5></td></tr>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
