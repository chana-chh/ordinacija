<?php

namespace App\Controllers;

class VlasnikController extends Controller
{
    public function getPocetna($request, $response)
    {
        $this->render($response, 'vlasnik/home.twig', compact('data'));
    }
}
