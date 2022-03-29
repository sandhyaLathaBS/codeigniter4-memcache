<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateInterval;
use DateTime;

class Site extends BaseController
{
    public function index()
    {
        $path = FCPATH . "/uploads/epg.xml";
        $xmlfile = file_get_contents($path);
        $new = simplexml_load_string($xmlfile);
        $con = json_encode($new);
        $newArr = json_decode($con, true);
        $data = [];
        if (!empty($newArr)) {
            foreach ($newArr['Mplaylist'] as  $value) {
                $parts = array_map(function ($num) {
                    return (int) $num;
                }, explode(':', $value['play_duration']));
                $timeA = new DateTime($value['start_time']);
                $timeB = new DateInterval(sprintf('PT%uH%uM%uS', @$parts[0], @$parts[1], @$parts[2]));
                $timeA->add($timeB);
                $endTime =  $timeA->format('d-m-Y h:i:s');
                $data[] = array(
                    'start_time' => $value['start_time'],
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'end_time' => $endTime,
                );
            }
        }
        $result['xml'] = $data;
        $this->cachePage(60);
        return view("xml-parser", $result);
    }
    public function Json_parser()
    {
        $path = FCPATH . "/uploads/access_log.json";
        $json = file_get_contents($path);
        $json_data = json_decode($json, true);
        $data = [];
        if (!empty($json_data)) {
            foreach ($json_data['item'] as  $value) {
                $data[] = array(
                    'client_ip' => $value['client_ip'],
                    'http_user_agent' => $value['http_user_agent'],
                );
            }
        }
        $result['json'] = $data;
        $this->cachePage(60);
        return view("json-parser", $result);
    }
}