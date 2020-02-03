<?php
include '../inc/db.php';
include 'inc/functions.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">

<div class="wrapper">

    <?php include 'inc/nav.php'; ?>
    <?php include 'inc/sidebar.php'; ?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="view-users.php">Users</a></li>
                            <li class="breadcrumb-item active">View Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">

                        <div class="card card-danger">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                            <option selected disabled>- Bulk Options -</option>
                                            <option value="granted">Granted</option>
                                            <option value="denied">Denied</option>
                                            <option value="delete">Delete</option>
                                            <option value="clone">Clone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
                            </div>
                        </div>

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Users List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-sm projects mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 60px;"><input type="checkbox" name="" id=""></th>
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>E-Mail</th>
                                        <th>Posts</th>
                                        <th>Access</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/user2-160x160.jpg"></td>
                                        <td>John</td>
                                        <td>Smith</td>
                                        <td>john@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-success">Granted</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="edit-user.php" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/giorgi_dvaladze.png"></td>
                                        <td>Giorgi</td>
                                        <td>Dvaladze</td>
                                        <td>giorgi_dvaladze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/giorgi_ortavidze.png"></td>
                                        <td>Giorgi</td>
                                        <td>Irtavidze</td>
                                        <td>giorgi_ortavidze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/irakli_gabaidze.png"></td>
                                        <td>Irakli</td>
                                        <td>Gabaidze</td>
                                        <td>irakli_gabaidze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/irakli_korpashvili.png"></td>
                                        <td>Irakli</td>
                                        <td>Korpashvili</td>
                                        <td>irakli_korpashvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/irakli_kvachrelishvili.png"></td>
                                        <td>Irakli</td>
                                        <td>Kvachrelishvili</td>
                                        <td>irakli_kvachrelishvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/lado_javakhishvili.png"></td>
                                        <td>Lado</td>
                                        <td>Javakhishvili</td>
                                        <td>lado_javakhishvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/lazare_gugushvili.png"></td>
                                        <td>Lazare</td>
                                        <td>Gugushvili</td>
                                        <td>lazare_gugushvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/liana_kvantaliani.png"></td>
                                        <td>Liana</td>
                                        <td>Kvantaliani</td>
                                        <td>liana_kvantaliani@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/lika_jijieshvili.png"></td>
                                        <td>Lika</td>
                                        <td>Jijieshvili</td>
                                        <td>lika_jijieshvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/maia_tsitsilashvili.png"></td>
                                        <td>Maia</td>
                                        <td>Tsitsilashvili</td>
                                        <td>maia_tsitsilashvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/mariam_mxatvari.png"></td>
                                        <td>Mariam</td>
                                        <td>Mxatvari</td>
                                        <td>mariam_mxatvari@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/mixeil_chemia.png"></td>
                                        <td>Mixeil</td>
                                        <td>Chemia</td>
                                        <td>mixeil_chemia@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/nana_kortua.png"></td>
                                        <td>Nana</td>
                                        <td>Kortua</td>
                                        <td>nana_kortua@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/nana_tsiklauri.png"></td>
                                        <td>Nana</td>
                                        <td>Tsiklauri</td>
                                        <td>nana_tsiklauri@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/nika_akhalbedashvili.png"></td>
                                        <td>Nika</td>
                                        <td>Akhalbedashvili</td>
                                        <td>nika_akhalbedashvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/nino_akhalbedashvili.png"></td>
                                        <td>Nino</td>
                                        <td>Akhalbedashvili</td>
                                        <td>nino_akhalbedashvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/qeti_kendelakishvili.png"></td>
                                        <td>Qeti</td>
                                        <td>Kendelakishvili</td>
                                        <td>qeti_kendelakishvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/qristine_chapidze.png"></td>
                                        <td>Kristine</td>
                                        <td>Chapidze</td>
                                        <td>qristine_chapidze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/salome_chelidze.png"></td>
                                        <td>Salome</td>
                                        <td>Chelidze</td>
                                        <td>salome_chelidze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/salome_tarkhnishvili.png"></td>
                                        <td>Salome</td>
                                        <td>Sarkhnishvili</td>
                                        <td>salome_tarkhnishvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/tamta_tsotskahalshvili.png"></td>
                                        <td>Tamta</td>
                                        <td>Tsotskahalshvili</td>
                                        <td>tamta_tsotskahalshvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/teona_geradze.png"></td>
                                        <td>Teona</td>
                                        <td>Geradze</td>
                                        <td>teona_geradze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/teona_verulashvili.png"></td>
                                        <td>Teona</td>
                                        <td>Verulashvili</td>
                                        <td>teona_verulashvili@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/tinatin_khachvani.png"></td>
                                        <td>Tinatin</td>
                                        <td>Khachvani</td>
                                        <td>tinatin_khachvani@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/tornike_tsiklauri.png"></td>
                                        <td>Tornike</td>
                                        <td>Tsiklauri</td>
                                        <td>tornike_tsiklauri@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/users/vasil_iremadze.png"></td>
                                        <td>Vasil</td>
                                        <td>Iremadze</td>
                                        <td>vasil_iremadze@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="new-user.php" class="btn btn-success btn-sm btn-flat">New User</a>
                            </div>
                        </div>

                        <nav aria-label="...">
                            <ul class="pagination pagination-sm">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include 'inc/footer.php'; ?>

</div>

<?php include 'inc/scripts.php'; ?>

</body>
</html>