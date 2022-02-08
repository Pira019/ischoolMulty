<?php

namespace App\Http\Controllers\DossierEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Abscence\RechercheAbscentRequest;
use App\Repositories\AbscencesRepository;
use Illuminate\Http\Request;

class AbscencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $title ='Gestion d\'abscence';

     protected $abscenceRepository;

     public function __construct(AbscencesRepository $abscenceRepository)
    {
        $this->middleware('auth');
        $this->abscenceRepository = $abscenceRepository;


    }


    public function index()
    {
        //

        //get année scolaire, seance, nbr heure
        $getclassModuleProf = $this->abscenceRepository->getClassModule();

       // return $getclassModuleProf ;
       return view('profile.create',['title' => $this->title], compact('getclassModuleProf') );

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RechercheAbscentRequest $inputs )
    {
        //

        $getclassModuleProf = $this->abscenceRepository->getClassModule();
        $EtudiantPresent = $this->abscenceRepository->getPresentStudent($inputs->all());

        // return $getclassModuleProf ;
        return view('profile.create',['title' => $this->title,
        'prensent' => $EtudiantPresent,
        'data' => $inputs],
         compact('getclassModuleProf'),
       );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}