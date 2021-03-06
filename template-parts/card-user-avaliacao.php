<div class="atomic_card background_white">
    <p class="escala1 bold mb-1">Feedbacks do time </p>
    <?php 
    $avaliacoes = processa_avaliacoes::filtraAvaliacoes($profile_obj);
    $n_avaliacoes = $avaliacoes->post_count;
    ?>
        <p class=" escala-1 grey"><?php echo "Vendo ".$n_avaliacoes." avaliações";?> </p>
    
    <?php
    $compilacao_avaliacao = array();
    while ( $avaliacoes->have_posts() ) : $avaliacoes->the_post(); 
        $campos = get_fields();
        $objetos_campo = get_field_objects();
        foreach($objetos_campo as $key => $campo){
            if(is_array($campo['value'])){
                foreach($campo['value'] as $value){
                    $compilacao_avaliacao[$campo['label']][$value]++;
                }
            }else{
                $compilacao_avaliacao[$campo['label']][(int)$campo['value']]++;
            }
        }
    endwhile;

    foreach($compilacao_avaliacao as $aspecto => $respostas){
        if(!in_array($aspecto, array("Oni avaliado", "Oni avaliador", "Selecione todos os atributos que esse oni representa:" ,"Validate Email"))){
            ?>
            <p class='escala0 bold onipink mt-4'><?php echo $aspecto;?></h3>
            <div class='d-inline-flex' >
            <?php
            for ($i=1; $i < 6; $i++) { 
                $percentual = 0;
                if(is_int($respostas[$i])){
                    $percentual = $respostas[$i]/$n_avaliacoes*100;
                    $percentual_restante = 100-($respostas[$i]/$n_avaliacoes*100);
                }else{
                    $percentual_restante = 100;
                }
            
                ?>
                <div class=" text-center">
                    <div class='column-bar'>
                        <div style='height: <?php echo $percentual_restante."%";?>; background-color: #f1f1f1; position:relative;'>
                            <p class='escala-2 grey mb-0' style='position:absolute; bottom:0; margin: 0 auto; width:100%;' ><?php echo round($percentual ,2)."%";?></p>
                        </div>
                    </div>
                    <p class='escala0 bold grey mt-2'><?php echo  $i;?></p>
                </div>
                <?php
            
            }
            
                    $percentual = 0;
            if(is_int($respostas[0])){
                $percentual = $respostas[0]/$n_avaliacoes*100;
                $percentual_restante = 100-($respostas[0]/$n_avaliacoes*100);
            }else{
                $percentual_restante = 100;
            }
            ?>
            <div class=" text-center">
                <div class='column-bar'>
                    <div style='height: <?php echo $percentual_restante."%";?>; background-color: #f1f1f1; position:relative;'>
                        <p class='escala-2 grey mb-0' style='position:absolute; bottom:0; margin: 0 auto; width:100%;' ><?php echo round($percentual ,2)."%";?></p>
                    </div>
                </div>
                <p class='escala0 bold grey mt-2'>Não teve contato</p>
            </div>
            </div>
            <?php
        } 
        if(in_array($aspecto, array("Selecione todos os atributos que esse oni representa:"))){
            ?>
            <p class='escala0 bold onipink mt-4'><?php echo $aspecto;?></h3>
            <div class='d-inline-flex' >
            <?php
            $atributos = array('Protagonista','Holístico','Evolutivo','Envolvente');
            foreach($atributos as $atributo) { 
                $percentual = 0;
                if(is_int($respostas[$atributo])){
                    $percentual = $respostas[$atributo]/$n_avaliacoes*100;
                    $percentual_restante = 100-($respostas[$atributo]/$n_avaliacoes*100);
                }else{
                    $percentual_restante = 100;
                }
            
                ?>
                <div class=" text-center">
                    <div class='column-bar-atributo'>
                        <div style='height: <?php echo $percentual_restante."%";?>; background-color: #f1f1f1; position:relative;'>
                            <p class='escala-2 grey mb-0' style='position:absolute; bottom:0; margin: 0 auto; width:100%;' ><?php echo round($percentual,2)."%";?></p>
                        </div>
                    </div>
                    <p class='escala0 bold grey mt-2'><?php echo  $atributo;?></p>
                </div>
            <?php
            }
            ?>
            </div>
            <?php
        } 
    }
?>
</div>

