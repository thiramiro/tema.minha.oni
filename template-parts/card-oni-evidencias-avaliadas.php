<?php
    while ( $evidencias->evidencias_filtradas->have_posts() ) : $evidencias->evidencias_filtradas->the_post(); 
    $campos = get_fields();
    if(preg_match('(sim|nao|onion_up)', $campos['parecer']) === 1) {
        ?>
        <div class="atomic_card background_white row">     
                <?php
                
                
                $id_evidencia = $post->ID;
                
                ?>
                <p class=' col-3 escala0'>
                <span class="<?php echo $campos['parecer'];?>">
                </p>
                    <p class=' col-4 escala0 bold onipink'>
                    <?php echo $campos['competencia']->post_title.$campos['Lente']->post_title;?>
                </p>
                <p class=' col-3 escala0 bold onipink'>
                    <?php echo $campos['projeto']->post_title;?>
                </p>
                <p class=' col-2 escala0 bold onipink'>
                    <?php echo $campos['data'];?>
                </p>
                <hr class='col-12 mt-0 ml-0'/>
                <p class="col-12  vermais ml-auto collapsed escala-2 onipink" data-toggle="collapse" data-target="<?php echo '#bloco'.$id_evidencia;?>" aria-expanded="false" aria-controls="<?php echo 'bloco'.$id_evidencia;?>"></p>
                <div class="collapse" id="<?php echo "bloco".$id_evidencia;?>">
                    <blockquote class=' col-12 escala-1 petro'>
                        <?php echo nl2br($campos['evidencia']);?>
                    </blockquote>
                    <p class=' col-12'>
                        <a class='  escala-1 bold onipink' href='<?php echo $campos['link_da_evidencia'];?>' target="_blank">
                        Link da evidência >>
                        </a>
                    </p>
                    <hr class='col-12  ml-0'/>
                    <?php
                    $form_fields = array();
                    $papel_do_gestor = false;
                    if($evidencias->evidencias_por_gestor[get_current_user_id()]){
                        foreach($evidencias->evidencias_por_gestor[get_current_user_id()] as $evidencia_gestor){
                            if($id_evidencia == $evidencia_gestor['evidencia']){
                                $papel_do_gestor = $evidencia_gestor['papel'];
                            }
                        }
                    }

                    if ( current_user_can('edit_users') || $papel_do_gestor == 'guardiao_metodo') { 
                        if($papel_do_gestor){
                            array_push($form_fields, 'field_5fb56429e862e');
                        }
                        if ($campos['feedback_guardiao_metodo']){
                            ?>
                            <div class='col-12 escala-1'>
                                <p class='onipink'>
                                Feedback do guardiao de método
                                </p>
                                <blockquote class='petro'>
                                    <?php echo nl2br($campos['feedback_guardiao_metodo']);?>
                                </blockquote>
                            </div>
                            <?php

                        }
                    
                    }
                    if (current_user_can('edit_users') || $papel_do_gestor == 'guardiao_visao') {
                        if($papel_do_gestor){
                            array_push($form_fields, 'field_5fce285c8903f');
                        }
                        if($campos['feedback_guardiao_visao']){
                            ?>
                            <div class='col-12 escala-1'>
                                <p class='onipink'>
                                Feedback do guardiao de visão
                                </p>
                                <blockquote class='petro'>
                                    <?php echo nl2br($campos['feedback_guardiao_visao']);?>
                                </blockquote>
                            </div>
                            <?php

                        }
                    
                    }
                    if (current_user_can('edit_users') || $papel_do_gestor == 'guardiao_time') {
                        if($papel_do_gestor){
                            array_push($form_fields, 'field_5fce286689040');
                        }
                        if($campos['feedback_guardiao_visao']){

                            ?>
                            <div class='col-12 escala-1'>
                                <p class='onipink'>
                                Feedback do guardiao de time
                                </p>
                                <blockquote class='petro'>
                                    <?php echo nl2br($campos['feedback_guardiao_time']);?>
                                </blockquote>
                            </div>
                            <?php
                            
                        }
                
                    }
                    if ( current_user_can('edit_users') ) {
                        array_push($form_fields, 'field_5fb56437e862f');
                        array_push($form_fields, 'field_5f8ef21e5fed6');
                        if($campos['feedback_dos_socios']){
                            ?>
                            <div class='col-12 escala-1'>


                                <p class='onipink'>
                                Feedback dos sócios
                                </p>
                                <blockquote class='petro'>
                                    <?php echo nl2br($campos['feedback_dos_socios']);?>
                                </blockquote>
                            </div>
                            <?php
                        }
                        
                    
                    }
            
                    if(current_user_can('edit_users')  || $papel_do_gestor){
                    ?>


                        <p class='col-12'>
                            <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="<?php echo '#evidencia'.$id_evidencia;?>" aria-expanded="false" aria-controls="<?php echo 'evidencia'.$id_evidencia;?>">Alterar feedback</button>
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="collapse" id="<?php echo "evidencia".$id_evidencia;?>">

                                    <div class="card card-body">
                                    <?php acf_form(array(
                                        'id' =>$id_evidencia,
                                        'fields' => $form_fields
                                        ));?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                

            </div>
        <?php
        }

    endwhile;
?>
