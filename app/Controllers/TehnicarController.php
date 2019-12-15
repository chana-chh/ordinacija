<?php

namespace App\Controllers;

class TehnicarController extends Controller
{
    public function getPocetna($request, $response)
    {
        $this->render($response, 'tehnicar/home.twig', compact('data'));
    }
}
