<?php

namespace App\Controllers;

class LekarController extends Controller
{
    public function getPocetna($request, $response)
    {
        $this->render($response, 'lekar/home.twig', compact('data'));
    }
}
