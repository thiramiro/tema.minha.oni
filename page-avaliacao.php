<?php
/*
Template Name: Avaliações
*/ 
?>
<?php get_header();acf_form_head(); 
acf_enqueue_uploader(); ?>
<?php
$avaliacoes = new processa_avaliacoes;

?>
<div class="container-fluid">
    <div class="row py-5">
        <div class="col-3">
            <?php 
            include(get_stylesheet_directory() . '/template-parts/card-onis-avaliacoes.php');
            ?>
        </div>
      

        <div class="col-7">
            <?php
            include(get_stylesheet_directory() . '/template-parts/card-oni-avaliacao-preenchimentos.php');
            ?>
         
        </div>

    </div>
</div>

<?php get_footer(); ?>