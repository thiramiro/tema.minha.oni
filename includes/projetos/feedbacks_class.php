<?php
/*
* Feedbacks
* Cria um post type chamado feedbacks e todas as suas configurações no ACF
* 
*/

class feedbacks_cliente{

    //variaveis
    private $nome_singular = 'Feedback cliente';
    private $nome_plural = 'Feedbacks cliente';
    private $post_slug = 'feedbacks_cliente';


    //disparando a classe
    public function __construct(){

        add_action('init', array($this,'adicionar_custom_post_type')); 
        add_action('init', array($this,'adicionar_campos_ACF')); 
        add_action('init', array($this,'check_flush_rewrite_rules')); 

    }

    //Adicionando o custom post type
    public function adicionar_custom_post_type(){
            $labels = array(
            'name'               => ucwords($this->nome_singular),
            'nome_singular'      => ucwords($this->nome_singular),
            'menu_name'          => ucwords($this->nome_plural),
            'name_admin_bar'     => ucwords($this->nome_singular),
            'add_new'            => ucwords($this->nome_singular),
            'add_new_item'       => 'Add New ' . ucwords($this->nome_singular),
            'new_item'           => 'New ' . ucwords($this->nome_singular),
            'edit_item'          => 'Edit ' . ucwords($this->nome_singular),
            'view_item'          => 'View ' . ucwords($this->nome_plural),
            'all_items'          => 'All ' . ucwords($this->nome_plural),
            'search_items'       => 'Search ' . ucwords($this->nome_plural),
            'parent_item_colon'  => 'Parent ' . ucwords($this->nome_plural) . ':', 
            'not_found'          => 'No ' . ucwords($this->nome_plural) . ' found.', 
            'not_found_in_trash' => 'No ' . ucwords($this->nome_plural) . ' found in Trash.',
        );
        
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'publicly_queryable'=> true,
            'show_ui'           => true,
            'show_in_nav'       => true,
            'query_var'         => true,
            'hierarchical'      => false,
            'supports'          => array('title','editor','thumbnail'), 
            'has_archive'       => true,
            'menu_position'     => 20,
            'show_in_admin_bar' => true,
            'menu_icon'         => 'dashicons-format-status'
        );
        
        register_post_type($this->post_slug, $args);
        
    }

    //Adicionando os campos do ACF
    public function adicionar_campos_ACF(){
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_603e7b4e16e28',
                'title' => 'Feedbacks cliente',
                'fields' => array(
                    array(
                        'key' => 'field_603e7bbc27729',
                        'label' => 'Projeto',
                        'name' => 'projeto',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'projetos',
                        ),
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'id',
                        'save_custom' => 0,
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_603e7bd5c94ca',
                        'label' => 'Frente',
                        'name' => 'frente',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_603e7beac94cc',
                        'label' => 'Em uma escala de 1 a 5, quanto essa entrega atingiu as expectativas?',
                        'name' => 'em_uma_escala_de_1_a_5_quanto_essa_entrega_atingiu_as_expectativas_',
                        'type' => 'radio',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_6049088394c20',
                        'label' => 'Em uma escala de 1 a 5, quanto nossa comunicação e acompanhamento foram claros?',
                        'name' => 'em_uma_escala_de_1_a_5_quanto_nossa_comunicacao_e_acompanhamento_foram_claros',
                        'type' => 'radio',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_603e7bdbc94cb',
                        'label' => 'Algum feedback em relação ao processo ou à entrega?',
                        'name' => 'algum_feedback_em_relacao_ao_processo_ou_a_entrega',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                        'acfe_textarea_code' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => $this->post_slug,
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'left',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'permalink',
                    1 => 'block_editor',
                    2 => 'the_content',
                    3 => 'excerpt',
                    4 => 'discussion',
                    5 => 'comments',
                    6 => 'revisions',
                    7 => 'slug',
                    8 => 'author',
                    9 => 'format',
                    10 => 'page_attributes',
                    11 => 'featured_image',
                    12 => 'categories',
                    13 => 'tags',
                    14 => 'send-trackbacks',
                ),
                'active' => true,
                'description' => '',
                'acfe_display_title' => '',
                'acfe_autosync' => '',
                'acfe_form' => 0,
                'acfe_meta' => '',
                'acfe_note' => '',
            ));
            
            endif;
    }

    //Função pronta que dá um refresh nos permalinks
    public function check_flush_rewrite_rules(){
        $has_been_flushed = get_option($this->post_slug . '_flush_rewrite_rules');
        //if we haven't flushed re-write rules, flush them (should be triggered only once)
        if($has_been_flushed != true){
            flush_rewrite_rules(true);
            update_option($this->post_slug . '_flush_rewrite_rules', true);
        }
    }

  

}

//Criando o objeto
$feedbacks_cliente = new feedbacks_cliente;





class feedback_time{

//variaveis
private $nome_singular = 'Feedback time';
private $nome_plural = 'Feedbacks time';
private $post_slug = 'feedback_time';


//disparando a classe
public function __construct(){

    add_action('init', array($this,'adicionar_custom_post_type')); 
    add_action('init', array($this,'adicionar_campos_ACF')); 
    add_action('init', array($this,'check_flush_rewrite_rules')); 

}

//Adicionando o custom post type
public function adicionar_custom_post_type(){
        $labels = array(
        'name'               => ucwords($this->nome_singular),
        'nome_singular'      => ucwords($this->nome_singular),
        'menu_name'          => ucwords($this->nome_plural),
        'name_admin_bar'     => ucwords($this->nome_singular),
        'add_new'            => ucwords($this->nome_singular),
        'add_new_item'       => 'Add New ' . ucwords($this->nome_singular),
        'new_item'           => 'New ' . ucwords($this->nome_singular),
        'edit_item'          => 'Edit ' . ucwords($this->nome_singular),
        'view_item'          => 'View ' . ucwords($this->nome_plural),
        'all_items'          => 'All ' . ucwords($this->nome_plural),
        'search_items'       => 'Search ' . ucwords($this->nome_plural),
        'parent_item_colon'  => 'Parent ' . ucwords($this->nome_plural) . ':', 
        'not_found'          => 'No ' . ucwords($this->nome_plural) . ' found.', 
        'not_found_in_trash' => 'No ' . ucwords($this->nome_plural) . ' found in Trash.',
    );
    
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_nav'       => true,
        'query_var'         => true,
        'hierarchical'      => false,
        'supports'          => array('title','editor','thumbnail'), 
        'has_archive'       => true,
        'menu_position'     => 20,
        'show_in_admin_bar' => true,
        'menu_icon'         => 'dashicons-format-status'
    );
    
    register_post_type($this->post_slug, $args);
    
}

//Adicionando os campos do ACF
public function adicionar_campos_ACF(){
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_604a1d1a0d764',
            'title' => 'Feedback gestores',
            'fields' => array(
                array(
                    'key' => 'field_604a1d819945e',
                    'label' => 'Frente',
                    'name' => 'frente',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_604a1da47a05f',
                    'label' => 'Projeto',
                    'name' => 'Projeto',
                    'type' => 'post_object',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'projetos',
                    ),
                    'taxonomy' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'return_format' => 'object',
                    'save_custom' => 0,
                    'save_post_status' => 'publish',
                    'acfe_bidirectional' => array(
                        'acfe_bidirectional_enabled' => '0',
                    ),
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_604a246ac97ab',
                    'label' => 'De 1 a 5, quanto a inteligência de projeto e informações passadas foram suficientes para sua atuação?',
                    'name' => 'de_1_a_5_quanto_a_inteligencia_de_projeto_e_informacoes_passadas_foram_suficientes_para_sua_atuacao',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
                array(
                    'key' => 'field_604a24fd6ac1c',
                    'label' => 'De 1 a 5, quanto você se sentiu amparada e acompanhada no processo de desenvolvimento?',
                    'name' => 'de_1_a_5_quanto_voce_se_sentiu_amparada_e_acompanhada_no_processo_de_desenvolvimento',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
                array(
                    'key' => 'field_604a25046ac1d',
                    'label' => 'De 1 a 5, quanto o tempo disponível para o desenvolvimento foi adequado?',
                    'name' => 'de_1_a_5_quanto_o_tempo_disponivel_para_o_desenvolvimento_foi_adequado',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
                array(
                    'key' => 'field_604a25166ac1e',
                    'label' => 'Qual foi o destaque positivo deste processo?',
                    'name' => 'qual_foi_o_destaque_positivo_deste_processo',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                    'acfe_textarea_code' => 0,
                ),
                array(
                    'key' => 'field_604a251f6ac1f',
                    'label' => 'O que poderia mudar nos próximos ciclos?',
                    'name' => 'o_que_poderia_mudar_nos_proximos_ciclos',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                    'acfe_textarea_code' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => $this->post_slug,
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'left',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'block_editor',
                2 => 'the_content',
                3 => 'excerpt',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'page_attributes',
                11 => 'featured_image',
                12 => 'categories',
                13 => 'tags',
                14 => 'send-trackbacks',
            ),
            'active' => true,
            'description' => '',
            'acfe_display_title' => '',
            'acfe_autosync' => '',
            'acfe_form' => 0,
            'acfe_meta' => '',
            'acfe_note' => '',
        ));
        
        endif;
}

//Função pronta que dá um refresh nos permalinks
public function check_flush_rewrite_rules(){
    $has_been_flushed = get_option($this->post_slug . '_flush_rewrite_rules');
    //if we haven't flushed re-write rules, flush them (should be triggered only once)
    if($has_been_flushed != true){
        flush_rewrite_rules(true);
        update_option($this->post_slug . '_flush_rewrite_rules', true);
    }
}



}

//Criando o objeto
$feedback_time = new feedback_time;
?>