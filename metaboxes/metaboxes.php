<?php
function add_content_type_metabox() {
	$post_types = array('interviews', 'meinungen', 'reportagen', 'reports', 'veranstaltungen', 'von-azubis-fur-azubi');
    foreach ($post_types as $post_type) {
        add_meta_box(
            'content_type_metabox',
            'Content type',
            'render_content_type_metabox',
            $post_type,
            'advanced',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'add_content_type_metabox');

function render_content_type_metabox($post) {
    $content_type = get_post_meta($post->ID, 'content_type', true);
    ?>
		<style>
			.components-panel .edit-post-meta-boxes-area #poststuff .hndle{
				padding-left: 16px;
			}
			.components-panel .edit-post-meta-boxes-area #poststuff .inside{
				padding: 0 16px 16px;
			}
			.components-panel .edit-post-meta-boxes-area #poststuff .inside label{
				display: block;
				margin-bottom: 10px;
			}
			.components-panel .edit-post-meta-boxes-area #poststuff .inside select{
				width: 100%;
				box-sizing: border-box;
			}
		</style>
		<label for="content_type" class="css-1imalal css-1imalal css-1imalal">Type</label>
		<select name="content_type" id="content_type">
			<option value="text" selected <?php selected($content_type, 'text'); ?>>Default</option>
			<option value="audio" <?php selected($content_type, 'audio'); ?>>Audio</option>
			<option value="video" <?php selected($content_type, 'video'); ?>>Video</option>	
		</select>

    <?php
}

function save_content_type_metabox($post_id) {
    if (isset($_POST['content_type'])) {
        update_post_meta($post_id, 'content_type', sanitize_text_field($_POST['content_type']));
    }
}
add_action('save_post', 'save_content_type_metabox');

// Дополнительно, проверка на сохранение данных
// function check_save_content_type_metabox() {
//     if (isset($_POST['post_ID']) && isset($_POST['action']) && $_POST['action'] === 'editpost') {
//         save_content_type_metabox($_POST['post_ID']);
//     }
// }
// add_action('edit_post', 'check_save_content_type_metabox');