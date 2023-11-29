<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class   DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //flash('Mensagem no canto superior direito')->overlay()->success();
        //flash('Mensagem de informação no canto superior direito')->overlay()->info();
        //flash('Mensagem fixa COM close button')->error(); // without important() we have the close button
        //flash('Mensagem fixa SEM close button')->warning()->important();// important disable close button
        //Mail::to('fabio.ferreira@noop.pt')->send(new ExceptionMail("tete"));
        //Mail::to('no-reply@alertaconcursospublicos.pt')->send(new ExceptionMail("tete"));
           // mail('fabio@seatwish.com', 'My Subject', "message");
        //Mail::to('fabio@seatwish.com')->send(new ExceptionMail("tete"));
        //Mail::to('eu@fabioferreira.pt')->send(new ExceptionMail("tete"));
        //Mail::to('abuse@SaadHost.com')->send(new ExceptionMail("tete"));
        //flash('Mensagem de informação no canto superior direito')->overlay()->info();
        //flash('Mensagem de informação no canto superior direito')->overlay()->danger();
        //flash('Mensagem de informação no canto superior direito')->overlay()->warning();
        //flash('Mensagem de informação no canto superior direito')->overlay()->success();
       // flash('Mensagem de informação no canto superior direito')->overlay()->info();
        /*flash('Info menssage')->overlay()->info();
        flash('danger')->overlay()->danger()->duration(3000);
        flash('success')->overlay()->success();
        flash('Warning   menssage')->overlay()->warning();
        flash('No icon')->overlay()->noIcon();
        flash('Titulo', 'Mensagem mais longa para fazer coisas')->overlay()->warning();*/
        flash('Bem vindo')->overlay()->success();


        //request()->session()->flash('flash.banner', 'Yay it works2!');
        /*request()->session()->flash('flash.banner', 'Yay it works1!');
        request()->session()->flash('overlay', [['type' =>'success', 'message' => 'Yay it works!'],['type' =>'danger', 'message' => 'Yay it danger!']]);
        request()->session()->flash('flash.overlay', 'Yay it works232323!');*/
        return view('home.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexAdmin()
    {
        //$action = new LoginAction(User::first());
        //$action->response(redirect('/'));
        flash('Mensagem de informação no canto superior direito')->overlay()->info();
        flash('Mensagem de informação no canto superior direito')->overlay()->info();
        //$urlToDashBoard = MagicLink::create($action)->protectWithAccessCode('secret')->url;
        //dd($urlToDashBoard);
        //flash('Mensagem no canto superior direito')->overlay()->success();
        //flash('Mensagem de informação no canto superior direito')->overlay()->info();
        //flash('Mensagem fixa COM close button')->error(); // without important() we have the close button
        //flash('Mensagem fixa SEM close button')->warning()->important();// important disable close button
        //Mail::to('fabio.ferreira@noop.pt')->send(new ExceptionMail("tete"));
        //Mail::to('no-reply@alertaconcursospublicos.pt')->send(new ExceptionMail("tete"));
        // mail('fabio@seatwish.com', 'My Subject', "message");
        //Mail::to('fabio@seatwish.com')->send(new ExceptionMail("tete"));
        //Mail::to('eu@fabioferreira.pt')->send(new ExceptionMail("tete"));
        //Mail::to('abuse@SaadHost.com')->send(new ExceptionMail("tete"));

        //$extensions = Extension::with('plans')->where('status',Extension::STATUS_ENABLED)->get();


        return view('home.index_admin');
    }

    /**
     * Show the Cookies page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function cookies(Request $request){
        return view('home.cookies');
    }

    /**
     * Show the Privacy Policy page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function privacyPolicy(Request $request){
        return view('home.privacy_policy');
    }

    /**
     * Show the Terms of Service page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function termsOfService(Request $request){
        return view('home.terms_of_service');
    }

    /**
     * Show the Success page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function success(Request $request){
        return view('home.success');
    }

    /**
     * handle the upload of a file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpload(Request $request){

        if($request->get('rules', false)){
            $rules = ['file' =>$request->get('rules', false) ];
        }else{
            $rules = [
                //'file' => 'required|file|max:5120'
                'file' => 'required|file|max:10240'
                //'file' => 'required|file|image|max:10240',
            ];
        }
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        if($validator->fails()){
            $error = $validator->errors()->first('file');
            return response()->json([
                'success' => false,
                'error' => $error,
                //'errors' => $validator->errors()
            ], 300);
        }

        $path = $request->file('file')->store('public/uploads');
        $file = $request->file('file');
        $url = Storage::url($path);

        return response()->json([
            'success' => true,
            'name'          => $path,
            'original_name' => $file->getClientOriginalName(),
            'url' => $url
        ]);
    }

    /**
     * TODO improve security of this endpoint
     * handle the delete of a file temporary uploaded file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUploadDelete(Request $request){
        //verify the filename given and if the filename starts with public/uploads to try to enforece the security of this endpoint
        //that is an open endpoint to delete files on the server.
        if(($filename = $request->get('name', false)) != false && str_starts_with($filename, 'public/uploads')) {
            return response()->json([
                'success' => Storage::delete($filename),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => __('File name not provieded'),
                //'errors' => $validator->errors()
            ], 300);
        }
    }

    /**
     * Try to renew the lock on a model
     * @param Request $request
     * @return array
     */
    public function renewModelLock(Request $request){
        $lockStatus = Lock::setLockOrReject(null, $request->get('modelType'), $request->get('modelId'), $request->get('close', null));
        return ['success' => $lockStatus];
    }

}
