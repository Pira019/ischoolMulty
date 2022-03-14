<?php

namespace App\Http\Controllers\Pedagogie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pedagogie\SavaEvaluationRequest;
use App\Http\Requests\Pedagogie\SearchEvalutionRqt;
use App\Repositories\Padagogie\EvaluationRepository;
use Illuminate\Http\Request;
use League\Flysystem\Config;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $title = "Evaluations";
    private $fillieres = array();
    private $evaluationRepository;

    public function __construct(EvaluationRepository $evaluationRepository)
    {
        $this->middleware('auth');

        $this->evaluationRepository = $evaluationRepository;

        $this->fillieres = $this->evaluationRepository->getFillière([]);


    }


    public function index()
    {


          return view('profile.index',[
            'title' => $this->title,
            'module' => true,
            'getclassModuleProf' => $this->fillieres->orderBy('codeFiliere')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SearchEvalutionRqt $evaluationRqt)
    {

         $getClasses = $this->evaluationRepository->getClasses(['code_Filiere'=>$evaluationRqt['fil']]);

         if ($evaluationRqt['codeModule']){
             $this->evaluationRepository->getModule($evaluationRqt['codeModule']);
         }


          return view('profile.index',[
            'title' => $this->title,
            'module' => true,
            'dataRqt' => $evaluationRqt->all(),
            'getclassModuleProf' => $this->fillieres->orderBy('codeFiliere')->get(),
            'getClasses' => $getClasses,
            'profs' => $this->evaluationRepository->getProf(
                ["codeClasse" => $evaluationRqt['cls']
                ]),

             'modules' => $this->evaluationRepository->getModulesByProfAndClass([
                 'codeClasse' =>$evaluationRqt['cls'],
                 'codeProfesseur' => $evaluationRqt['prof']

             ]),

             'students' =>  $this->evaluationRepository->getStudent([
                 'module'=>$evaluationRqt['module'],
                  'mb.codeClasse'=>$evaluationRqt['cls'],
                 'mb.anneeScolaire' => session('annee'),


             ] ,   $evaluationRqt['module']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(SavaEvaluationRequest $request)
    {
        $visible =null;

        if ($request['classe']){

            $visible = true;
        }


        $this->evaluationRepository->saveEvalution($request->all());

        return back()->with([
            "module" => $visible
        ]);
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
