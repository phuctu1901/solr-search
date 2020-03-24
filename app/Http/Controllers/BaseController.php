<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use App\Models\KeySearch;
use function GuzzleHttp\json_decode;
use DB;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Similarity\CosineSimilarity;

class BaseController extends Controller
{
  
    public function get_view_base(){
        return view('base.master');
    }
    public function get_solr_base_api(Request $request){

        $key = $request->search;
        // $key_1 = preg_replace('/[\\]/',"",$key);
        $key_n = preg_replace('/[:?<>!@#$%^&~\/]/',"",$key);

        
        $spell= null ;
        
        $key_s = $key_n;
       
        
        $client = new Client(['base_uri' => 'http://192.168.8.110:8983/solr/diemthithpt2016/']);
       
        $response_content   = $client->request('GET', 'select?q=sobaodanh%3A'.$key_s.'&rows=100');
       
        $content_content    = $response_content->getBody();

       
        $results        = json_decode($content_content->getContents(),true);



        $responseHeader = $results['responseHeader'];
        $status         = $responseHeader['status'];
        $QTime          = $responseHeader['QTime'];

        $response       = $results['response'];
        $numFound       = $response['numFound'];
        $start          = $response['start'];
        $docs           = $response['docs'];
        $numResult      = $numFound ;
        $timeSearch     = $QTime;
        $flag = true;

        // Phần phân trang kết quả tìm kiếm
        $page = Input::get('page',1);
        $perpage = 10;
        $offset = ($page*$perpage) - $perpage;
        $json_doc = new LengthAwarePaginator(array_slice($docs,$offset,$perpage,true),count($docs),$perpage,$page,['path'=>$request->url(),'query'=> $request->query()]);


        return view('base.result',
                    [
                    'flag' => $flag,
                    'docs'=>$json_doc,
                    'numFound'=>$numFound,
                    'numResult'=>$numResult,
                    'timeSearch' => $timeSearch,
                    'key' => $key,
                    'results '=> $results ,
                    'spell' => $spell,
                    ]
        );
    }
}
