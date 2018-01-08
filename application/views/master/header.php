<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php echo base_url('assets/img/favicon.png') ?>">

        <title>Forum Diskusi</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <!-- Plugins -->
        <link rel="stylesheet" href="https://unpkg.com/sweetalert2@7.3.4/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" integrity="sha256-I4gvabvvRivuPAYFqevVhZl88+vNf2NksupoBxMQi04=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <style>
            body {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .header,
            .marketing,
            .footer {
                padding-right: 1rem;
                padding-left: 1rem;
            }

            .header {
                padding-bottom: 1rem;
                border-bottom: .05rem solid #e5e5e5;
            }

            .header h3 {
                margin-top: 0;
                margin-bottom: 0;
                line-height: 3rem;
            }

            .footer {
                padding-top: 1.5rem;
                color: #777;
                border-top: .05rem solid #e5e5e5;
            }

            @media (min-width: 48em) {
                .container {
                    max-width: 46rem;
                }
            }
            .container-narrow > hr {
                margin: 2rem 0;
            }

            .jumbotron {
                text-align: center;
                border-bottom: .05rem solid #e5e5e5;
            }
            .jumbotron .btn {
                padding: .75rem 1.5rem;
                font-size: 1.5rem;
            }

            .marketing {
                margin: 3rem 0;
            }

            @media screen and (min-width: 48em) {
                .header,
                .marketing,
                .footer {
                    padding-right: 0;
                    padding-left: 0;
                }

                .header {
                    margin-bottom: 2rem;
                }

                .jumbotron {
                    border-bottom: 0;
                }
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <header class="header clearfix">
                <nav>
                    <ul class="nav nav-pills float-right">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ?>">Diskusi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('berita') ?>">Berita</a>
                        </li>

                        <?php if ($this->session->userdata('user_id')): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username') ?></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('user/' . $this->session->userdata('username')) ?>">Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/sign-out') ?>">Logout</a>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('auth') ?>">Login</a>
                            </li>
                        <?php endif ?>

                    </ul>
                </nav>
                <h3 class="text-muted">Forum diskusi</h3>
            </header>