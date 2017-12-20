<?php /*Template Name: Home*/ ?>
<?php get_header(); ?>

<section class="slider-img">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

        <?php
          //consulta slides

          $slider = new WP_Query( array(
            'post_type' => 'carousel-home',
            'post_per_page' => 6,
            'orderby' => 'menu_order date',
            'order' => 'asc'
          ));
        ?>

        <div id="carousel-home" class="carousel slide" data-ride="carousel" data-interval="5000">
          <!-- Indicators
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>-->

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $i = 0 ?>
            <?php
              while ($slider->have_posts() ) { ?>
                <?php $slider->the_post(); ?>

                <?php
                  $imgCelular = get_field("imagem_celulares");
                  $imgTablets = get_field( "imagem_tablets" ) ;
                  $imgDesktops = get_field( "imagem_desktop" ) ;
                ?>

                <div class="item <?=($i == 0) ? 'active' : null ?>" data-img-celular="<?=$imgCelular['url']?>" data-img-tablet="<?=$imgTablets['url']?>" data-img-desktop="<?=$imgDesktops['url'] ?>">
                  <div class="carousel-caption">
                    <a href="<?php the_field('call_to_action'); ?>"><?php the_field('titulo_post'); ?></a>
                  </div>
                </div>
                <?php $i++ ?>
              <?php } ?>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span></span>
          </a>
          <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <?php
          //busca post destaque

          $postDestaque = array(
            'post_type' => 'post',
            'order' => 'asc',
            'post_per_page' => 2,
            'meta_key' => 'post_destaque',
            'meta_value' => 1
          );

          $destaque = new WP_Query ($postDestaque);
        ?>

        <?php if ($destaque->have_posts() ): ?>
          <?php while ($destaque->have_posts() ): $destaque->the_post(); ?>
            <div class="box-destaque">
              <figure>
                <div class="box-lateral">
                  <div class="box-image">
                    <a href="<?php the_permalink() ?>">
                      <?php if(has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                      <?php } ?>
                    </a>
                  </div>
                </div>
                <div class="titulo-destaque">
                  <a href="<?php the_permalink() ?>"><h1 class="link-post"><?php the_title() ?></h1></a>
                  <span>Postado por <?php the_author() ?></span>
                </div>
              </figure>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="post">
  <?php
    $argPost = array(
      'post-type' => 'post',
      'post_per_page' => 4
    );
    $postHome = new WP_Query($argPost);
  ?>

  <div class="container">
    <div class="row">
      <?php
        $argPost = array(
          'post_type' => 'post',
          'posts_per_page' => 9
        );
        $postHome = new WP_Query($argPost);
        if ($postHome->have_posts()) {
          while ($postHome->have_posts()) {?>
            <?php $postHome->the_post() ?>
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
               <div class="box-post wow fadeInUp" data-wow-duration="1.5s">
                 <div class="capa-post">
                   <?php if (has_post_thumbnail()): ?>
                     <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-responsive') ) ?>
                   <?php endif; ?>
                   <div class="retina-post"></div>
                 </div>
                 <div class="bloco-post">
                   <p class="data-post"><?php the_time('j \d\e F \d\e Y') ?></p>
                  <h1><?php the_title() ?></h1>
                  <p><?php the_excerpt_limit(30) ?></p>

                  <div class="hr-estilizado sem-margem separador"></div>

                  <ul class="list-unstyled list-inline comments">
                    <li><i class="fa fa-heart-o" aria-hidden="true"></i> 53 curtidas</li>
                    <li><i class="fa fa-comment-o" aria-hidden="true"></i> Deixe um comentário</li>
                  </ul>
                 </div>
               </div>
               <div class="clearfix"></div>
             </div>
          <?php
          }
        }
        wp_reset_query();
      ?>
    </div>



    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="paginacao">
          <?php wp_pagination() ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contato">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="phone-contato">
          <i class="fa fa-mobile icon-contato" aria-hidden="true"></i>
          <p>(XX) XXXXX-XXXX</p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="endereco-contato">
          <i class="fa fa-map-marker icon-contato" aria-hidden="true"></i>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="mail-contato">
          <i class="fa fa-envelope-o icon-contato" aria-hidden="true"></i>
          <p>email@email.com</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pre-footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <h1 class="titulo-pre-footer">Sobre Nós</h1>
        <div class="sobre">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <h1 class="titulo-pre-footer">Empresa</h1>
        <ul class="list-unstyled">
          <li>Lorem ipsum dolor sit amet</li>
          <li>Lorem ipsum dolor sit amet</li>
          <li>Lorem ipsum dolor sit amet</li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <h1 class="titulo-pre-footer">Introdução</h1>
        <ul class="list-unstyled">
          <li>Lorem ipsum dolor sit amet</li>
          <li>Lorem ipsum dolor sit amet</li>
          <li>Lorem ipsum dolor sit amet</li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <h1 class="titulo-pre-footer">Portfolio</h1>
        <ul class="list-unstyled">
          <li>Portfolio 1</li>
          <li>Portfolio 2</li>
          <li>Portfolio 3</li>
        </ul>
      </div>
    </div>
    <hr class="hr-pre-footer">

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <ul class="list-unstyled list-inline menu-pre-footer">
          <li><a href="<?php echo esc_url(home_url('/') ); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(home_url('portfolio') ); ?>">Portfolio</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <ul class="list-unstyled list-inline social-pre-footer">
          <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
