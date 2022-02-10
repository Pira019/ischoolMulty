<?php

namespace App\Http\Controllers\DossierEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Abscence\RechercheAbscentRequest;
use App\Http\Requests\Abscence\SaveAbscentRequest;
use App\Repositories\AbscencesRepository;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;


class AbscencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $title ='Gestion d\'abscence';

     protected $abscenceRepository;
     protected $getclassModuleProf;

     public function __construct(AbscencesRepository $abscenceRepository)
    {
        $this->middleware('auth');
        $this->abscenceRepository = $abscenceRepository;

        $this->getclassModuleProf = $this->abscenceRepository->getClassModule();


    }


    public function index()
    {
        //

        //get année scolaire, seance, nbr heure
        $getclassModuleProf = $this->abscenceRepository->getClassModule();

       // return $getclassModuleProf ;
       return view('profile.create',['title' => $this->title,'dataRqt' => []]
        ,compact('getclassModuleProf') );

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


        $dataRqt= $inputs;

        return view(
        'profile.create',['title' => $this->title,
        'prensent' => $EtudiantPresent,
        'dataRqt' => $inputs
    ],
         compact('getclassModuleProf'),
       );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAbscentRequest $request)
    {

        $EtudiantPresent = $this->abscenceRepository->getPresentStudent($request->all());



       $this->abscenceRepository->save($request->all());


         return
             view( 'profile.create',[
              'dataRqt' => $request,
              'title' => $this->title,
           ]

           );

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