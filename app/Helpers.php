
<?php
 
if(!function_exists('get_groups')) {
 
    function get_groups() {
   $groups = App\Group::all();

    return $groups;
    }


}
 
?>