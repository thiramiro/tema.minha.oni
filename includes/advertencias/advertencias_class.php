<?php
/*
* Advertências
* Cria um post type chamado Advertências e todas as suas configurações no ACF
*/

class advertencias{

    //variaveis
    private $nome_singular = 'Advertência';
    private $nome_plural = 'Advertências';
    private $post_slug = 'advertencias';


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
                'key' => 'group_5fb3cc63a755f',
                'title' => 'Advertências',
                'fields' => array(
                    array(
                        'key' => 'field_5fb3cc7608aad',
                        'label' => 'Data',
                        'name' => 'data',
                        'type' => 'date_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'acfe_permissions' => '',
                        'display_format' => 'd/m/Y',
                        'return_format' => 'd/m/Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5fb3cc8b08aae',
                        'label' => 'Oni',
                        'name' => 'oni',
                        'type' => 'user',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'acfe_permissions' => '',
                        'role' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                    ),
                    array(
                        'key' => 'field_5fb3cc9a08aaf',
                        'label' => 'Explicação',
                        'name' => 'explicacao',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'acfe_permissions' => '',
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
                'acfe_permissions' => '',
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
$advertencias = new advertencias;
?>