<?php

/** @var yii\web\View $this */

use app\widgets\UserTasksWidget;

$this->title = 'My Yii Application';
$this->registerCssFile('@web/css/widget.css');
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/css/templatemo-topic-listing.css" rel="stylesheet">    

<div class="site-index">

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                            <h6 class="text-center">platform for creatives around the world</h6>

                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">
                                        
                                    </span>

                                    <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                                    <button type="submit" class="form-control">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

<section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="topics-detail.html">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Web Design</h5>

                                            <p class="mb-0">When you search for free CSS templates, you will notice that TemplateMo is one of the best websites.</p>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">14</span>
                                    </div>

                                    <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>



                        <div class="col-lg-6 col-12">
    <div class="custom-block custom-block-overlay">
        <div class="d-flex flex-column h-100">
            <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

            <div class="custom-block-overlay-text d-flex flex-column">
                <div>
                    <h2 class="text-white mb-2">Your Tasks</h2>
                    <span class="badge bg-design rounded-pill ms-auto" style="position: absolute; top: 30px; right: 30px; background-color: #BA0F30;"><?= count($tasks) ?></span>
                </div>

                <ul class="list-group list-group-flush" style="width:34em; overflow-y: auto; height: 250px; margin-top: 20px;">
    <?php foreach ($tasks as $task): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:transparent; color:white;">
            <div class="task-details">
                <?= $task->title ?>
                <small><?= Yii::$app->formatter->asDate($task->created_at, 'php:d M Y') ?></small>
                <p class="mb-1"><?= $task->description ?></p>
            </div>
            <span class="badge custom-badge <?= $task->status == 1 ? 'bg-success' : 'bg-danger' ?> rounded-pill" style="width: 100px"><?= $task->status == 1 ? 'Active' : 'Not Active' ?></span>
        </li>
    <?php endforeach; ?>
</ul>

            </div>

            <div class="social-share d-flex">
                <p class="text-white me-4">Share:</p>

                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-pinterest"></a>
                    </li>
                </ul>

                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
            </div>

            <div class="section-overlay"></div>
        </div>
    </div>
</div>
</div>
</div>
</section>


            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay" style="border-radius: 100px;"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">How does it work?</h1>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">Search your favourite topic</h4>

                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?</p>

                                        <div class="icon-holder">
                                          <i class="bi-search"></i>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <h4 class="text-white mb-3">Bookmark &amp; Keep it for yourself</h4>

                                        <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore. Doloremque, repudiandae?</p>

                                        <div class="icon-holder">
                                          <i class="bi-bookmark"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Read &amp; Enjoy</h4>

                                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                        <div class="icon-holder">
                                          <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5">
                            <p class="text-white">
                                Want to learn more?
                                <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

    <div id="draggable" class="ui-widget-content draggable" style="display: none;">
        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= UserTasksWidget::widget() ?>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/jquery-ui-1.13.2.custom/jquery-ui.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/click-scroll.js"></script>
<script src="js/custom.js"></script>
