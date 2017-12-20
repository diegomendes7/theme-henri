<?php /*Template Name: Portfolio*/ ?>
<?php get_header() ?>
<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

      <div style="background-image:url(<?php echo $image[0] ?>)" class="back-pagina">
        <div class="retina-back">
          <div class="container">
            <h1 class="titulo-pagina"><?php the_title() ?></h1>
          </div>
        </div>
      </div>

      <section>
        <div class="container">
          <?php
            $wpPortfolio = new WP_Query (array(
              'post_type' => 'portfolio',
              'orderby' => 'title',
              'order' => 'asc',
            ))
          ?>

          <div class="button-group filter-button-group">
            <ul class="list-unstyled list-inline filtro-port">
              <button class="btn btn-portfolio" type="submit" data-filter="*">Todos</button>
              <?php
                $termo = get_terms(
                  array(
                    'taxonomy' => 'categoria-portfolio',
                    'hide_empty' => false,
                  )
                );

                foreach ($termo as $termPort) { ?>
                  <button class="btn btn-portfolio" type="submit" data-filter=".<?php echo $termPort->$term_id ?>"><?php echo $termPort->name ?></button>
                <?php }
              ?>
            </ul>
          </div>

          <div class="grid">
            <?php if ($wpPortfolio->have_posts() ): ?>
              <div class="row">
                <?php while ($wpPortfolio->have_posts() ): $wpPortfolio->the_post(); ?>
                  <?php $termoPostCorrent = get_the_terms($post->ID, 'categoria-portfolio'); ?>
                  <a href="<?php the_permalink(); ?>">

                    <div class="grid-item item-grid <?php echo $termoPostCorrent[0]->term_id ?> col-md-4">
                      <div class="capa-port">
                        <?php if (has_post_thumbnail()): ?>
                          <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-responsive') ) ?>
                        <?php endif; ?>
                        <div class="retina-port">
                          <div class="item-portfolio">
                            <h3 class="titulo-portfolio"> <?php the_title(); ?></h3>
                            <p class="nome-categoria-home"><?php echo $termPort->name ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                <?php endwhile ?>
              </div>
            <?php endif ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer() ?>
