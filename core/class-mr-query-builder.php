<?php

/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

if (!class_exists('mr_query_builder')) {

    /**
     * Query Builder class of search instance
     *
     * All search query will build to this class.
     *
     * @class       mr_query_builder
     * @version     1.0
     * @category    Class
     * @author      Shapon Pal
     */
    class mr_query_builder
    {


        /**
         * @var array of Index Table of search instance
         */

        private $indexing;


        /**
         * @var array of setting options
         */

        private $setting;


        /**
         * @var array of configuration of search
         */

        private $config;


        /**
         * @var array of error of search
         */

        private $error;


        /**
         * Access token
         * @var string
         */
        private $access_token = 'shaponpal';


        /**
         * mr_query_builder constructor.
         */

        function __construct()
        {
            global $wpdb;
            $this->wpdb =& $wpdb;
            $this->prefix = $wpdb->prefix;
            $this->indexing = array('page', 'post', 'product');
            $this->access_token = 'shaponpal'.uniqid();
            $this->setting = array();
            $this->error = '';

            $this->config = array(
                'ais_title' => 'bot',
                'ais_content' => 'bot',
                'ais_excerpt' => 'bot',
            );
        }

     /**
	 * Generate Query
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function makeQuery($skey) {

		$qs = "SELECT p.id, p.post_title, p.post_content, p.post_excerpt, p.post_type, (SELECT GROUP_CONCAT(meta_value) FROM `{$this->prefix}postmeta` WHERE `post_id` LIKE p.id AND `meta_value` LIKE '%".$skey."%' ) as atts FROM `{$this->prefix}posts` p WHERE p.post_status = 'publish'  AND p.post_type IN('post', 'page', 'product')  AND (p.post_title = '".$skey."' OR p.post_title LIKE '".$skey."%' OR p.post_title LIKE '%".$skey."%' OR p.post_title LIKE '%".$skey."' OR p.post_content = '".$skey."' OR p.post_content LIKE '%".$skey."%' OR p.post_content LIKE '%".$skey."' OR p.post_excerpt = '".$skey."' OR p.post_excerpt LIKE '%".$skey."%' OR p.post_excerpt LIKE '%".$skey."' OR   
        
        p.id IN( SELECT `post_id` FROM `{$this->prefix}postmeta` WHERE `meta_value` LIKE '".$skey."' OR `meta_value` LIKE '%".$skey."' OR `meta_value` LIKE '%".$skey."%' OR `meta_value` LIKE '".$skey."%' )
        
        )  ORDER BY  ((CASE WHEN atts  LIKE '".$skey."' THEN 80 ELSE 0 END) +  (CASE WHEN atts  LIKE '".$skey."%' THEN 70 ELSE 0 END) + (CASE WHEN atts  LIKE '%".$skey."' THEN 60 ELSE 0 END) +  (CASE WHEN atts  LIKE '%".$skey."%' THEN 49 ELSE 0 END) + (CASE WHEN p.post_title  LIKE '".$skey."%' THEN 20 ELSE 0 END) +  (CASE WHEN p.post_title  LIKE '".$skey."%' THEN 16 ELSE 0 END) +  (CASE WHEN p.post_title  LIKE '%".$skey."%' THEN 12 ELSE 0 END) + (CASE WHEN p.post_content  LIKE '".$skey."%' THEN 10 ELSE 0 END) +  (CASE WHEN p.post_content  LIKE '%".$skey."%' THEN 6 ELSE 0 END) +  (CASE WHEN p.post_excerpt  LIKE '".$skey."%' THEN 10 ELSE 0 END) +  (CASE WHEN p.post_excerpt  LIKE '%".$skey."%' THEN 6 ELSE 0 END)  )  DESC  LIMIT 0, 10";

		return $qs;

    }
    
	public function makeQuery22($skey) {

		$qs = "SELECT p.id, p.post_title, p.post_content, p.post_excerpt, p.post_type, (SELECT GROUP_CONCAT(meta_value) FROM `{$this->prefix}postmeta` WHERE `post_id` LIKE p.id AND `meta_value` LIKE '%".$skey."%' ) as atts FROM `{$this->prefix}posts` p WHERE p.post_status = 'publish'  AND p.post_type IN('post', 'page', 'product')  AND (p.post_title = '".$skey."' OR p.post_title LIKE '".$skey."%' OR p.post_title LIKE '%".$skey."%' OR p.post_title LIKE '%".$skey."' OR p.post_content = '".$skey."' OR p.post_content LIKE '%".$skey."%' OR p.post_content LIKE '%".$skey."' OR p.post_excerpt = '".$skey."' OR p.post_excerpt LIKE '%".$skey."%' OR p.post_excerpt LIKE '%".$skey."' OR   p.id IN( SELECT `post_id` FROM `{$this->prefix}postmeta` WHERE `meta_value` LIKE '%".$skey."%' ))  ORDER BY  ((CASE WHEN atts  LIKE '".$skey."' THEN 80 ELSE 0 END) +  (CASE WHEN atts  LIKE '".$skey."%' THEN 70 ELSE 0 END) + (CASE WHEN atts  LIKE '%".$skey."' THEN 60 ELSE 0 END) +  (CASE WHEN atts  LIKE '%".$skey."%' THEN 49 ELSE 0 END) + (CASE WHEN p.post_title  LIKE '".$skey."%' THEN 20 ELSE 0 END) +  (CASE WHEN p.post_title  LIKE '".$skey."%' THEN 16 ELSE 0 END) +  (CASE WHEN p.post_title  LIKE '%".$skey."%' THEN 12 ELSE 0 END) + (CASE WHEN p.post_content  LIKE '".$skey."%' THEN 10 ELSE 0 END) +  (CASE WHEN p.post_content  LIKE '%".$skey."%' THEN 6 ELSE 0 END) +  (CASE WHEN p.post_excerpt  LIKE '".$skey."%' THEN 10 ELSE 0 END) +  (CASE WHEN p.post_excerpt  LIKE '%".$skey."%' THEN 6 ELSE 0 END)  )  DESC  LIMIT 0, 10";

		return $qs;

	}


	public function doQuery($skey){
		try{   
			global $wpdb;
            $qString = $this->makeQuery($skey);
            $results = $this->wpdb->get_results($qString, object);
            if (count($results) > 0) {
                $status = 'success';
            } else {
                $status = 'No Result Found';
            }

            } catch (Exception $e) {
                $results = array();
                $this->error = $e;
                $status = 'Something going Wrong!!';
            }
            $last_query_error = $wpdb->last_error;

            return array(
                'data' => $results,
                'status' => $status,
                'last_query_error' => $last_query_error,
                'sql' => $qString,
                'prefix' => $this->prefix,
                'access_token' => $this->access_token,
                'error' => $this->error
            );
	}


    }
}