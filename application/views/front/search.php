        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Search by News Title</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <h2 class="text-center mb-5" style="border-bottom: 3px double #000000;"><?= $search_key ?></h2>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php 
                                if($posts){
                                foreach($posts as $cmr){
                            ?>
                                <div class="col-md-3">
                                    <div class="mn-img">
                                        <img src="<?= base_url('img/admin/media/'.$cmr->image) ?>" height="150" />
                                        <div class="mn-title">
                                            <a href="<?= base_url('post/'.$cmr->id) ?>"><?= $cmr->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->