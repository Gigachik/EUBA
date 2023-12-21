<?php   
    add_action('wp_ajax_save_slider_value', 'save_slider_value');
    add_action('wp_ajax_nopriv_save_slider_value', 'save_slider_value');
    add_action('wp_ajax_get_average_slider_value', 'get_average_slider_value');
    add_action('wp_ajax_nopriv_get_average_slider_value', 'get_average_slider_value');

    function save_slider_value() {
        if (isset($_POST['slider_value'])) {
            $slider_value = intval($_POST['slider_value']);
            $answer = sanitize_text_field($_POST['answer']);

            update_user_meta(get_current_user_id(), 'slider_value', $slider_value);
            update_user_meta(get_current_user_id(), 'slider_answer', $answer);
         
            wp_send_json_success();
        } else {
            wp_send_json_error('Ошибка: Значение слайдера не было передано.');
        }
    }
  
    

    function get_average_slider_value($answer) {
    
        global $wpdb;
    
        $average_slider_value = $wpdb->get_var("SELECT AVG(meta_value) FROM {$wpdb->usermeta} WHERE meta_key = 'slider_value'");
       
        // $users_with_yes = get_users(array(
        //     'meta_key' => 'slider_answer',
        //     'meta_value' => 'yes',
        // ));
        // $votes_yes = count($users_with_yes);
        // $users_with_no = get_users(array(
        //     'meta_key' => 'slider_answer',
        //     'meta_value' => 'no',
        // ));
        // $votes_no = count($users_with_no);      

        // $total_votes = $votes_yes + $votes_no;
        // $unique_values = $wpdb->get_col("SELECT DISTINCT meta_value FROM {$wpdb->usermeta} WHERE meta_key = 'slider_answer'");
    
        // $percentage_yes = ($total_votes > 0) ? round(($votes_yes / $total_votes) * 100, 2) : 0;
        // $percentage_no = ($total_votes > 0) ? round(($votes_no / $total_votes) * 100, 2) : 0;

        // $majorityPrecentege = $votes_yes > $votes_no ? $percentage_yes : $percentage_no;
    
        wp_send_json_success(array('majorityPrecentege' => $average_slider_value));

    }

?>     