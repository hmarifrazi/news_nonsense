        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('category/'.$cat->id) ?>"><?= $cat->name ?></a></li>
                    <li class="breadcrumb-item active">News Post</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">
                            <div class="sn-img">
                                <img src="<?= base_url('img/admin/media/'.$post->image) ?>" height="450" />
                            </div>
                            <div class="sn-info mt-5">
                                <a href="" style="pointer-events: none;">Date: &nbsp;</a> <span><?= date('d M, Y',strtotime($post->created_at)) ?></span>
                            </div>
                            <div class="sn-content">
                                <h1 class="sn-title"><?= $post->title ?></h1>
                                <?= $post->description ?>
                            </div>
                        </div>

                        <div class="sn-comment">
                            <h2 class="mt-5">Comments</h2>
                            <?= $this->session->flashdata('message'); ?>
                            <?php if($comments){
                                foreach($comments as $com){ ?>

                                <div class="row">
                                    <div class="sn-img col-lg-1">
                                        <span><?= date('d M',strtotime($com->created_at)) ?></span>
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="sn-title">
                                            <a href="" style="pointer-events: none;"><?= $com->name ?></a>
                                        </div>
                                        <div><?= $com->message ?></div>
                                    </div>
                                </div>

                            <?php
                                }
                            } ?>
                            

                            <div class="row">
                                <form method="post" action="<?= base_url('homeCtrl/comment_save') ?>" class="col-lg-12 mt-5">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" id="name" name="fullname">
                                        <input type="hidden" value="<?= $post->id ?>" name="pid">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email_address">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control" name="message"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave a comment"
                                            class="btn font-weight-semi-bold py-2 px-3" style="background: #FF6F61; color: white;">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">More From <?= $cat->name ?></h2>
                                <div class="news-list">
                                <?php if($relpost){
                                    foreach($relpost as $rp){ ?>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="<?= base_url('img/admin/media/thumb/'.$rp->image) ?>" height="70" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="<?= base_url('post/'.$rp->id) ?>"><?= $rp->title ?></a>
                                        </div>
                                    </div>
                                <?php } } ?>
                                    
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="image">
                                    <img src="<?= base_url('img/admin/ad/'.$ad2->image) ?>" alt="Advertisement Image"></a>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="tab-news">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending">Trending</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            <?php if($featured){
                                                    foreach($featured as $rp){ ?>    
                                                        <div class="tn-news">
                                                            <div class="tn-img">
                                                                <img src="<?= base_url('img/admin/media/thumb/'.$rp->image) ?>" height="70" />
                                                            </div>
                                                            <div class="tn-title">
                                                                <a href="<?= base_url('post/'.$rp->id) ?>"><?= $rp->title ?></a>
                                                            </div>
                                                        </div>
                                            <?PHP } } ?>
                                        </div>
                                        
                                        <div id="trending" class="container tab-pane fade">
                                            <?php if($trending){
                                                    foreach($trending as $rp){ ?>    
                                                        <div class="tn-news">
                                                            <div class="tn-img">
                                                                <img src="<?= base_url('img/admin/media/thumb/'.$rp->image) ?>" height="70" />
                                                            </div>
                                                            <div class="tn-title">
                                                                <a href="<?= base_url('post/'.$rp->id) ?>"><?= $rp->title ?></a>
                                                            </div>
                                                        </div>
                                            <?PHP } } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="image">
                                    <img src="<?= base_url('img/admin/ad/'.$ad3->image) ?>" alt="Advertisement Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="sw-title">Tags</h2>
                                <?php if($tag){ foreach($tag as $t){ ?>
                                    <a href="<?= base_url('tag/'.$t->id) ?>" class="btn btn-light m-1" role="button" style="float: right;  border: 1.5px solid #ff6f61; margin-bottom: 45px !important;"><?= $t->name ?></a>
                                <?php }} ?>  
                            </div>

                            <div class="sidebar-widget">
                                <div class="image">
                                    <img src="<?= base_url('img/admin/ad/'.$ad4->image) ?>" alt="Advertisement Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->