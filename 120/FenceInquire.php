<html>

<input type="button" value="新增柵欄" onClick="location.href='gmap_contain_test2.php';">
</html>
<?php

include('ajax.php');

echo "<select id = 'select' onchange = 'ajax(\"orange_test.php\",\"output\")'>";

 
//echo "<option selected='selected'>select parent menu</option>";
    
  
    // 定義資料庫相關變數
    // 定義資料庫相關變數
	$servername = "localhost";
    $username = "sanavtes_tw";
    $password = "89694553";
    $dbname = "sanavtes_sanjose";
    
    // 連結資料庫
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    
   //SHOW TABLES 但不show 'aaaaaaa'.'all_googlemap'
    $sql = "SHOW TABLES 
      WHERE tables_in_sanavtes_sanjose NOT LIKE 'all_googlemap' 
        AND tables_in_sanavtes_sanjose NOT LIKE 'actions'
		AND tables_in_sanavtes_sanjose NOT LIKE 'authmap'
		AND tables_in_sanavtes_sanjose NOT LIKE 'batch'
		AND tables_in_sanavtes_sanjose NOT LIKE 'blocked_ips'
		AND tables_in_sanavtes_sanjose NOT LIKE 'block'
		AND tables_in_sanavtes_sanjose NOT LIKE 'blocked_ips'
		AND tables_in_sanavtes_sanjose NOT LIKE 'block_custom'
		AND tables_in_sanavtes_sanjose NOT LIKE 'block_node_type'
		AND tables_in_sanavtes_sanjose NOT LIKE 'block_role'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_block'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_bootstrap'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_field'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_filter'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_form'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_image'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_menu'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_page'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_path'
		AND tables_in_sanavtes_sanjose NOT LIKE 'cache_update'
		AND tables_in_sanavtes_sanjose NOT LIKE 'comment'
		AND tables_in_sanavtes_sanjose NOT LIKE 'date_formats'
		AND tables_in_sanavtes_sanjose NOT LIKE 'date_format_locale'
		AND tables_in_sanavtes_sanjose NOT LIKE 'date_format_type'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_config'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_config_instance'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_data_body'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_data_comment_body'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_data_field_image'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_data_field_tags'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_revision_body'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_revision_comment_body'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_revision_field_image'
		AND tables_in_sanavtes_sanjose NOT LIKE 'field_revision_field_tags'
		AND tables_in_sanavtes_sanjose NOT LIKE 'file_managed'
		AND tables_in_sanavtes_sanjose NOT LIKE 'file_usage'
		AND tables_in_sanavtes_sanjose NOT LIKE 'filter'
		AND tables_in_sanavtes_sanjose NOT LIKE 'flood'
		AND tables_in_sanavtes_sanjose NOT LIKE 'history'
		AND tables_in_sanavtes_sanjose NOT LIKE 'image_effects'
		AND tables_in_sanavtes_sanjose NOT LIKE 'menu_custom'
		AND tables_in_sanavtes_sanjose NOT LIKE 'menu_links'
		AND tables_in_sanavtes_sanjose NOT LIKE 'menu_router'
		AND tables_in_sanavtes_sanjose NOT LIKE 'node'
		AND tables_in_sanavtes_sanjose NOT LIKE 'node_access'
		AND tables_in_sanavtes_sanjose NOT LIKE 'node_comment_statistics'
		AND tables_in_sanavtes_sanjose NOT LIKE 'node_revision'
		AND tables_in_sanavtes_sanjose NOT LIKE 'node_type'
		AND tables_in_sanavtes_sanjose NOT LIKE 'queue'
		AND tables_in_sanavtes_sanjose NOT LIKE 'rdf_mapping'
		AND tables_in_sanavtes_sanjose NOT LIKE 'registry'
		AND tables_in_sanavtes_sanjose NOT LIKE 'registry_file'
		AND tables_in_sanavtes_sanjose NOT LIKE 'role'
		AND tables_in_sanavtes_sanjose NOT LIKE 'role_permission'
		AND tables_in_sanavtes_sanjose NOT LIKE 'search_dataset'
		AND tables_in_sanavtes_sanjose NOT LIKE 'search_index'
		AND tables_in_sanavtes_sanjose NOT LIKE 'search_node_links'
		AND tables_in_sanavtes_sanjose NOT LIKE 'search_total'
		AND tables_in_sanavtes_sanjose NOT LIKE 'semaphore'
		AND tables_in_sanavtes_sanjose NOT LIKE 'sequences'
		AND tables_in_sanavtes_sanjose NOT LIKE 'sessions'
		AND tables_in_sanavtes_sanjose NOT LIKE 'shortcut_set'
		AND tables_in_sanavtes_sanjose NOT LIKE 'shortcut_set_users'
		AND tables_in_sanavtes_sanjose NOT LIKE 'system'
		AND tables_in_sanavtes_sanjose NOT LIKE 'taxonomy_index'
		AND tables_in_sanavtes_sanjose NOT LIKE 'taxonomy_term_data'
		AND tables_in_sanavtes_sanjose NOT LIKE 'taxonomy_term_hierarchy'
		AND tables_in_sanavtes_sanjose NOT LIKE 'taxonomy_vocabulary'
		AND tables_in_sanavtes_sanjose NOT LIKE 'tdsts'
		AND tables_in_sanavtes_sanjose NOT LIKE 'test'
		AND tables_in_sanavtes_sanjose NOT LIKE 'url_alias'
		AND tables_in_sanavtes_sanjose NOT LIKE 'users'
		AND tables_in_sanavtes_sanjose NOT LIKE 'users_roles'
		AND tables_in_sanavtes_sanjose NOT LIKE 'variable'
		AND tables_in_sanavtes_sanjose NOT LIKE 'watchdog'
		AND tables_in_sanavtes_sanjose NOT LIKE 'filter_format'
		AND tables_in_sanavtes_sanjose NOT LIKE 'image_styles'
		";
    $res = $conn->query($sql);
     while($row=$res->fetch_array())
    {

        
        echo "<option value='" . $row['Tables_in_sanavtes_sanjose'] . "'>" . $row['Tables_in_sanavtes_sanjose'] . "</option>";
    }

echo"</select>";

echo "<div id = 'output'/>";



    
?>
 
