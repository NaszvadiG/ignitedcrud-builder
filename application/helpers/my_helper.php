<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 /**
  *  @Description: A better html entities handles £ sign
  *       @Params: $var
  *
  *    @returns: Escaped string containing pound signs
  */
if ( ! function_exists('my_html_escape'))
{
    function my_html_escape($var)
    {
       $tmp = htmlentities($var,ENT_QUOTES,"UTF-8");
       
       return $tmp; 

    }   
}
/**
  *  @Description: Pretty up the date format
  *       @Params: datestamp
  *
  *     @returns: pretty date
  */


if ( ! function_exists('my_pretty_date'))
{
    function my_pretty_date($var)
    {
       //use ci active record
       return date('j M Y g:i A',strtotime($var));

    }   
}


/**
  *  @Description: get username
  *       @Params: none
  *
  *     @returns: username or string "Profile" if none set
  */


if ( ! function_exists('my_username'))
{
    function my_username()
    {
        //check if session is set
        $CI =& get_instance();
        if($CI->session->userdata('userid') !== "FALSE")
        {
          $userid = $CI->session->userdata('userid');

          $CI =& get_instance();
          $CI->db->select('name');
          $CI->db->from('user');
          $CI->db->where('id', $userid);
          $CI->db->limit(1);

          $query = $CI->db->get();
          $name = "";
          foreach ($query->result() as $row) 
          {
            $name = $row->name;
          }
          return $name;
        }
        else{
          return "Profile";
        }
    }   
}




/**
  *  @Description: renders user dashboard depending on permissions
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_render_dashboard'))
{
    function my_render_dashboard()
    {
        //check if session is set
        $CI =& get_instance();

        //pretty up the output
        $CI->load->helper('inflector');

        $userid = $CI->session->userdata('userid');

        $CI->load->model('Stuff_permissions');
        $list = $CI->Stuff_permissions->get_permissions($userid);

        //echo $list;
        //strip the last comma
        $list = trim($list,",");

        $access = explode(",", $list);



        foreach ($access as $key) {
          //get the icon
          $icon = $CI->Stuff_permissions->get_icon($key);
          $name = $CI->Stuff_permissions->get_name($key);
          $file_path = base_url("img/dashboard") . "/$key.svg";

          // echo("<a href=". site_url("admin/$key").">
          //         <div class='col-sm-2 my-pad-top'>
          //              <img class='img-responsive my-center' src='$file_path' alt='image'>
          //              <div class='igs-label'>".($name)."</div>

          //         </div>
          //       </a>");


        }

        
    }   
}



/**
  *  @Description: get the friendly url from route
  *       @Params: string eg admin/test_twig/display/3/2
  *
  *     @returns: returns
  */
if ( ! function_exists('my_friendly_url'))
{
    function my_friendly_url($string)
    {
      $CI =& get_instance();
      $CI->db->select('route');
      $CI->db->from('routes');
      $CI->db->where('controller', $string);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $url = "";
      foreach ($query->result() as $row) 
      {
        $url = $row->route;
      }
      return $url;

    }   
}


/**
  *  @Description: show the site title
  *       @Params: params
  *
  *     @returns: returns
  */
if ( ! function_exists('my_site_title'))
{
    function my_site_title()
    {
      $CI =& get_instance();
      $CI->db->select('site');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $site = "";
      foreach ($query->result() as $row) 
      {
        $site = $row->site;
      }
      return $site;

    }   
}

/**
  *  @Description: show the Group Permission name
  *       @Params: role id
  *
  *     @returns: returns
  */
if ( ! function_exists('my_role'))
{
    function my_role($id)
    {
      $CI =& get_instance();
      $CI->db->select('groupName');
      $CI->db->from('permission_groups');
      $CI->db->where('groupID', $id);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $groupName = "";
      foreach ($query->result() as $row) 
      {
        $groupName = $row->groupName;
      }
      return $groupName;

    }   
}













 






 




 





        