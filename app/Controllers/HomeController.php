<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function getHome($request, $response)
    {
        $data="data";
        // $this->flash->addMessage('success', 'Dobrodošli u Ordinaciju');
        $this->render($response, 'home.twig', compact('data'));
    }
}
