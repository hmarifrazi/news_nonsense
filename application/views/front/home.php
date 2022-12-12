    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">

                        <?php 
                            if($hslider){
                            foreach($hslider as $hs){
                        ?>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?= base_url('img/admin/media/'.$hs->image) ?>" height="400"/>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$hs->id) ?>"><?= $hs->title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                        
                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">

                        <?php 
                            if($hmain){
                            foreach($hmain as $hmn){
                        ?>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?= base_url('img/admin/media/'.$hmn->image) ?>" height="200" />
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$hmn->id) ?>"><?= $hmn->title ?></a>
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
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <?php 
                    if($catsl){
                    foreach($catsl as $cs){
                ?>
                    <div class="col-md-6">
                        <h2> <?=$cs->name?> </h2>
                        <div class="row cn-slider">

                            <?php 
                                $hcat=$this->db->where('category', $cs->id)->get('post')->result();
                                if($hcat){
                                foreach($hcat as $hc){
                            ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="<?= base_url('img/admin/media/'.$hc->image) ?>" height="150" />
                                        <div class="cn-title">
                                            <a href="<?= base_url('post/'.$hc->id) ?>"><?= $hc->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                <?php } } ?>
                                
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div id="featured" class="container tab-pane active">

                            <?php 
                                if($ftab){
                                foreach($ftab as $ft){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$ft->image) ?>" height="110"  />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$ft->id) ?>"><?= $ft->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>

                        <div id="popular" class="container tab-pane fade">

                            <?php 
                                if($ptab){
                                foreach($ptab as $pt){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$pt->image) ?>" height="110"  />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$pt->id) ?>"><?= $pt->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>

                        <div id="latest" class="container tab-pane fade">

                            <?php 
                                if($ltab){
                                foreach($ltab as $lt){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$lt->image) ?>" height="110"  />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$lt->id) ?>"><?= $lt->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">

                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#trending">Trending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#spotlight">Spotlight</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#videos">Videos</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="trending" class="container tab-pane active">

                            <?php 
                                if($ttab){
                                foreach($ttab as $tt){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$tt->image) ?>" height="110" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$tt->id) ?>"><?= $tt->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>

                        <div id="spotlight" class="container tab-pane fade">

                            <?php 
                                if($stab){
                                foreach($stab as $st){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$st->image) ?>" height="110" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$st->id) ?>"><?= $st->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>

                        <div id="videos" class="container tab-pane fade">

                            <?php 
                                if($vtab){
                                foreach($vtab as $vt){
                            ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="<?= base_url('img/admin/media/'.$vt->image) ?>" height="110"/>
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?= base_url('post/'.$vt->id) ?>"><?= $vt->title ?></a>
                                    </div>
                                </div>
                            <?php } } ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Tab News End -->

    <!-- Editorial News Start -->
    <div class="editorial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 style="border-bottom: 3px black double">Editorials</h2>
                    <div class="row">

                        <?php 
                            if($edtl){
                            foreach($edtl as $e){
                        ?>
                            <div class="col-md-3">
                                <div class="mn-img">
                                    <img src="<?= base_url('img/admin/media/'.$e->image) ?>" height="180" />
                                    <div class="mn-title">
                                        <a href="<?= base_url('post/'.$e->id) ?>"><?= $e->title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Editorial News End -->

    <!-- Main News Start -->
    <div class="main-news">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <h2 style="border-bottom: 3px black double">More Nonsense...</h2>
                    <div class="row">

                        <?php 
                            if($hmore){
                            foreach($hmore as $hmr){
                        ?>
                            <div class="col-md-3">
                                <div class="mn-img">
                                    <img src="<?= base_url('img/admin/media/'.$hmr->image) ?>" height="150" />
                                    <div class="mn-title">
                                        <a href="<?= base_url('post/'.$hmr->id) ?>"><?= $hmr->title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->