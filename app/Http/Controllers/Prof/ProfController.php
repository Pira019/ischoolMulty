<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Interfaces\Prof\IProfesseur;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * ProfController constructor.
     */
    private $title;
    private $professeurRepo ;

    public function __construct(IProfesseur $IProfesseur)
    {
        $this->middleware('auth');
        $this->middleware(['role:professeur']);

        $this->professeurRepo = $IProfesseur;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('profile.index',[
            'title' => $this->title,
            'module' => true,
            'getclassModuleProf' => $this->professeurRepo->getFilliere()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

         return view('profile.index',[
            'title' => $this->title,
            'module' => true,
            'dataRqt' => $request->all(),
            'getclassModuleProf' => $this->professeurRepo->getFilliere()->get(),
            'getClasses' => $this->professeurRepo->getClasses(['code_Filiere'=>$request['fil']]),
           'students' => $this->professeurRepo->getStudentsByClasses(
            [ 'annee_scolaire' => session('annee'),
                'code_classe' => $request['cls']
            ], $request['module']),

            'modules' => $this->professeurRepo->getModules([
           'codeClasse' =>$request['cls'],
                ]),

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
