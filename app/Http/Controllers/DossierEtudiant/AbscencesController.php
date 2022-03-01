<?php

namespace App\Http\Controllers\DossierEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Abscence\RechercheAbscentRequest;
use App\Http\Requests\Abscence\SaveAbscentRequest;
use App\Http\Requests\Abscence\UpdateAbsentStudentsRequest;
use App\Repositories\AbscencesRepository;
use App\Repositories\PersonnelRepository;
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

     protected $abscenceRepository,$personnalRepo;
     protected $getclassModuleProf,$getTeachers;

     public function __construct(AbscencesRepository $abscenceRepository)
    {
        $this->middleware('auth');
        $this->abscenceRepository = $abscenceRepository;

        $this->getclassModuleProf = $this->abscenceRepository->getClassModule();
        $this->personnalRepo = new PersonnelRepository();


    }


    public function index()
    {
        //

        //get année scolaire, seance, nbr heure
        $getclassModuleProf = $this->abscenceRepository->getClassModule();

       // return $getclassModuleProf ;
       return view('profile.create',
       ['title' => $this->title,'dataRqt' => [],
        'getclassModuleProf' => $this->getclassModuleProf,
         'teachers' => $this->personnalRepo->getTeachers()
    ]

);


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RechercheAbscentRequest $inputs )
    {
        //


        $EtudiantPresent = $this->abscenceRepository->getPresentStudent($inputs->all());

        $etudiantAbscents = $this->abscenceRepository->getAbscentsStudent($inputs->all());



        return view(
        'profile.create',['title' => $this->title,
        'prensent' => $EtudiantPresent,
        'absents' => $etudiantAbscents,
        'dataRqt' => $inputs,
        'getclassModuleProf' => $this->getclassModuleProf,
         'teachers' => $this->personnalRepo->getTeachers()
    ]
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

        $saveQuest = new SaveAbscentRequest($request->all());


              $this->abscenceRepository->upDateAbsentStudent($request->all());


                $saveQuest->validate($saveQuest->rules());
                $this->abscenceRepository->save($request->all());


        return back()->with([
            'Status' => "Absence marquée",
            'input' => $saveQuest]);

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