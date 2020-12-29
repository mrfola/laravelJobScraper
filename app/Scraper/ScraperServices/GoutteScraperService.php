<?php

namespace App\Scraper\ScraperServices;

use Goutte\Client;
use App\Scraper\ScraperInterface;
use Symfony\Component\HttpClient\HttpClient;

class GoutteScraperService implements ScraperInterface
{
    
    /**
     * Gets data from specfied url by scraping the DOM
     * 
     * @param $url
     * 
     * @return ScrapedData Returns the scraped data from the particular page
     * 
     */
    public $search_query_separator;
    public $base_search_url;
    public $search_segments;
    public $search_term;
    public $extractables;
    public $parent_dom;

     public function set_variables($job_website)
     {
        //set variables
        $this->search_segments = $job_website["searchSegments"];
        $this->base_search_url =  $job_website["baseSearchURI"];
        $this->extractables = $job_website["extractables"];
        $this->search_query_separator = $job_website["search_query_separator"];
        $this->parent_dom = $job_website["parentDOM"];
     }

     //build full search url from base url and filters
     public function build_search_url($search_term, $separator = "+")
     {  
        $this->search_term = $search_term;

        $search_term_array = explode(" ", $search_term);
        $search_term_filters = implode($separator, $search_term_array);
        $searchQuery = $this->base_search_url."?".$this->search_segments."=".$search_term_filters;
       //$searchQuery = "https://www.linkedin.com/jobs/search?keywords=web%20dev&redirect=false&position=1&pageNum=00";
        return $searchQuery;
        
     }

     public function connect_scraper_service($searchQuery)
     {
        //connect to goutte scraper client
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $scraper = $client->request('GET', $searchQuery);
        return $scraper;
     }

     
     public function extract_data($scraper_service, $extractables)
     {

         $data_result_array["job_data_id"] = "ABSCDE";//$request["job_data_id"];
         $data_result_array["base_search_uri"] =  $this->base_search_url ;
         $data_result_array["parent_dom"] = $this->parent_dom;
       
        foreach($extractables as $extractable)
        {
           
           $extractable_variable = $extractable['variable'];
  
          $$extractable_variable = $scraper_service->filter($extractable['source'])->each(function($node) use (&$extractable)
           {
                if($extractable['attribute'] == "text")
                { 
                    return $node->text(); 
                }else
                {
                    return $node->attr($extractable['attribute']);
                }
            });

           //compile results from each loop into an array.
           $data_result_array[$extractable_variable] = $$extractable_variable;
        }
        
         return $data_result_array;
     } 


      public function scrap($search_term)
      {     
         //build search url based on query separateor
         $searchQuery = $this->build_search_url($search_term, $this->search_query_separator);

         //connect to goutte scraper
         $scraper = $this->connect_scraper_service($searchQuery);
        
         //dynamically get all content 
        $data = $this->extract_data($scraper, $this->extractables);

        return $data;
        
      }
}