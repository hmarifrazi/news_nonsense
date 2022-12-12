        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $cname->name ?></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <h2 class="text-center mb-5" style="border-bottom: 3px double #000000;"><?= $cname->name ?></h2>
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">

                            <?php 
                                if($cslider){
                                foreach($cslider as $cs){
                            ?>
                                <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$cs->image) ?>" height="350" />
                                        <div class="tn-title">
                                            <a href="<?= base_url('post/'.$cs->id) ?>"><?= $cs->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">

                            <?php 
                                if($cmain){
                                foreach($cmain as $cmn){
                            ?>
                                <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$cmn->image) ?>" height="175" />
                                        <div class="tn-title">
                                            <a href="<?= base_url('post/'.$cmn->id) ?>"><?= $cmn->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>        
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <h2 style="border-bottom: 3px black double">More Nonsense...</h2>
                        <div class="row">

                            <?php 
                                if($cmore){
                                foreach($cmore as $cmr){
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