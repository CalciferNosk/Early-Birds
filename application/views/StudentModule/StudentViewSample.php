<?php
// var_dump($data);die;
if (!isset($_SESSION['GeneratedId'])) redirect('') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Early Birds</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="">
                    <img src="<?= base_url() ?>assets/img/EB-sun.png" height="15" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover" id="home" href="#"><i class="fas fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover" id="team" href="#"><i class="fas fa-file-lines"></i> Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover" id="quiz" href="#"><i class="fas fa-file-lines"></i> quiz</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover " data-create="<?= $data_control->CreatePost?>" data-mdb-toggle="modal" id="CreatePost" href="#"><i class="far fa-images"></i></i> create post</a>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover" id="team" href="" ><i class="fas fa-arrows-rotate"></i></i> refresh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link eb-font-hover" id="Chat" data-allowed="<?= $data_control->Chat?>"  href="#"></i><i class="fas fa-comment-dots"></i></i> Chat</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->


                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>

                <label id="stud_username" for="navbarDropdownMenuAvatar"></label> &nbsp;
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img onerror="this.src='<?= base_url() ?>assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" id="logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <div class="container-fluid row">
        <div class="col-md-3">
            list here
        </div>
        <div class="col-md-6 p-2" style="max-height: 720px;overflow-y:scroll">
            <?php foreach ($data as $key => $news) : ?>
                <section class="m-3">
                    <div class="card shadow-lg" style="max-width: 42rem">
                        <div class="card-body">
                            <!-- Data -->
                            <div class="d-flex mb-3">
                                <a href="">
                                    <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                </a>
                                <div>
                                    <a href="" class="text-dark mb-0">
                                        <strong><?= $news['CreatedBy'] ?></strong>
                                    </a>
                                    <a href="" class="text-muted d-block" style="margin-top: -6px">
                                        <small>10h</small>
                                    </a>
                                </div>
                            </div>
                            <!-- Description -->
                            <div>
                                <p>
                                    <?= $news['newsfeed'] ?>
                                </p>
                            </div>
                        </div>
                        <?php if ($news['img'] != null) : ?>
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light" style="padding:50px;">
                                <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/NewsFeedSrc/<?= $news['img'] ?>" class="w-100">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <!-- Reactions -->
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span>
                                        <?php if($news['like_total'] != 0): ?>
                                        <a href="">
                                            <i class="fas fa-thumbs-up text-primary"></i>
                                            <span><?= $news['like_total'] ?></span>
                                        </a>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div>
                                    <a href="#" class="text-muted view-comment"> <?= $news['CommentsCount'] ?> comments </a>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between text-center border-top border-bottom mb-4">
                                <button type="button" data-id="" 3="" class="btn btn-link btn-lg like-post" data-mdb-ripple-color="dark">
                                    <i class="fas fa-thumbs-up me-2"></i>Like
                                </button>
                                <button type="button" data-id="3" class="btn btn-link btn-lg view-comment" data-mdb-ripple-color="dark">
                                    <i class="fas fa-comment-alt me-2"></i>Comment
                                </button>
                                <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                                    <i class="fas fa-share me-2"></i>Share
                                </button>
                            </div>
                            <?php if($data_control->Comment == 1): ?>
                            <div class="d-flex mb-3 ">
                                <a href="">
                                    <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                </a>
                                <div class="form-outline w-100 d-flex">
                                    <textarea class="form-control" id="comment-parent-<?=$news['id']?>" rows="2"></textarea>
                                    <label class="form-label" for="comment-<?= $news['id'] ?>">Write a comment</label>
                                    <i class="fas fa-paper-plane eb-send comment-parent" data-nfid="<?= $news['id']?>"></i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- here -->
                            <?php if($data_control->Comment == 1): ?>
                            <div id="comment-main-display-<?= $news['id']?>" style="max-height: 300px;overflow-y:scroll">
                                <?php
                                if ($news['comments'] != null) :
                                    foreach ($news['comments'] as $key => $comment) : ?>
                                        <div class="d-flex mb-3 ">
                                            <a href="">
                                                <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                            </a>
                                            <div>
                                                <div class="bg-light rounded-3 px-3 py-1">
                                                    <a href="" class="text-dark mb-0">
                                                        <strong><?= $comment['CreatedBy'] ?></strong>
                                                    </a>
                                                    <a href="" class="text-muted d-block">
                                                        <small>
                                                            <?= $comment['comment'] ?></small>
                                                    </a>
                                                </div>
                                                <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                                                <a href="" class="text-muted small me-2" data-id="3"><strong>Reply</strong></a>
                                                <br><br>
                                                <div id="sub-comment-main-display-<?= $comment['id']?>">
                                                <?php if ($comment['sub_comment'] != null) :
                                                    foreach ($comment['sub_comment'] as $key_sub => $sub) : ?>
                                                        <div class="d-flex mb-3">
                                                            <a href="">
                                                                <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                                            </a>
                                                            <div>
                                                                <div class="bg-light rounded-3 px-3 py-1">
                                                                    <a href="" class="text-dark mb-0">
                                                                        <strong><?= $sub['CreatedBy'] ?></strong>
                                                                    </a>
                                                                    <a href="" class="text-muted d-block">
                                                                        <small><?= $sub['comment'] ?></small>
                                                                    </a>
                                                                </div>
                                                                <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                                                                <!-- <a href="" class="text-muted small me-2"><strong>Report</strong></a>-->
                                                            </div>
                                                        </div>
                                                <?php endforeach;
                                                endif; ?>
                                                </div>
                                                <div class="d-flex mb-3">

                                                    <a href="">
                                                        <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                                    </a>
                                                    <div class="form-outline w-100 d-flex">
                                                        <textarea class="form-control" id="reply-<?= $comment['id']?>" rows="2"></textarea>
                                                        <label class="form-label" id="reply-" for="reply-<?= $comment['id']?>">Reply to <?= $comment['Created_id'] == $_SESSION['GeneratedId'] ? 'Your Comment' : $comment['fname'] ?></label>
                                                        <i class="fas fa-paper-plane eb-send sub-comment" data-scid ="<?= $comment['id']?>"></i>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <?php
                            else: echo '<i>You dont have access To view comment.</i>';
                            endif; ?>
                        </div>
                    </div>
                </section>

            <?php endforeach; ?>
        </div>
        <div class="col-md-3 p-2 mb-3">
            <div class="container-fluid  d-flex justify-content-center">
                <button class="btn btn-info"> Time-in</button>
                &nbsp;
                <button class="btn btn-secondary"> Time-out</button>
            </div>
            <br>
            <div class="container-fluid  d-flex justify-content-center card p-4">
                <table>
                    <tr>
                        <td>Erickon Adriano</td>
                        <td style="color:green">timed in</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid" hidden>
        <div class="card m-1 p-3">
            home
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create-post" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="create-postLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-postLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="create-post-submit" enctype="multipart/form-data" data-formstate="0" data-otptries="3" data-otpstate="0" data-otp-exp-min="5">
                    <div class="modal-body">
                        <textarea class="summernote" id="text-post" name="post_text"></textarea>
                        <hr>
                        <label class="form-label" for="customFile">Add Photo</label>
                        <input type="file" id="file-post" name="file-post" class="form-control" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Create post ',
                tabsize: 2,
                height: 200,
            });
        });
    </script>
</body>

</html>