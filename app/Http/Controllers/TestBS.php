<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestBS extends Controller
{
    //
    public function maj($nom, $prenom, $username, $groupe)
    {
      return view('BS-loopings.maj')->with('nom', $nom)
                                    ->with('prenom', $prenom)
                                    ->with('username', $username)
                                    ->with('groupe', $groupe);
    }
    public function creer()
    {
      return view('BS-loopings.creer');
    }
    public function tableau()
    {
      $erreur = "[SQLERR:50945]Duplicate constraint error";
      return view('BS-loopings.tableau')->with('erreur', $erreur);
    }
    public function index()
    {
      return view('BS-loopings.index');
    }
    public function blank()
    {
      return view('BS-loopings.blank');
    }
    public function buttons()
    {
      return view('BS-loopings.buttons');
    }
    public function flot()
    {
      return view('BS-loopings.flot');
    }
    public function forms()
    {
      return view('BS-loopings.forms');
    }
    public function grid()
    {
      return view('BS-loopings.grid');
    }
    public function icons()
    {
      return view('BS-loopings.icons');
    }
    public function login()
    {
      return view('BS-loopings.login');
    }
    public function morris()
    {
      return view('BS-loopings.morris');
    }
    public function notifications()
    {
      return view('BS-loopings.notifications');
    }
    public function panelswells()
    {
      return view('BS-loopings.panels-wells');
    }
    public function tables()
    {
      return view('BS-loopings.tables');
    }
    public function typography()
    {
      return view('BS-loopings.typography');
    }
}
