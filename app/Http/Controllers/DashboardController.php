<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class   DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Get auth user
        $user = auth()->user();
        // Get the user entity (it has support for multiple entities but for now we only have one entity per user)
        $userEntity = $user->entities->first();

        // Get all events from the user
        $events = $userEntity->events;

        // Get total tickets bought for all events from the user
        $tickets = $events->map(function ($event) {
            return $event->eventSessions->map(function ($eventSession) {
                return $eventSession->eventSessionTickets->map(function ($eventSessionTicket) {
                    return count($eventSessionTicket->accessTickets);
                });
            })->flatten();
        })
        ->flatten()
        ->sum();

        // For each accessTicket, subtract the "tickets_count" with the "max_check_in" from the eventSessionTicket
        $totalEntries = $events->map(function ($event) { // events
            return $event->eventSessions->map(function ($eventSession) { // eventSessions
                return $eventSession->eventSessionTickets->map(function ($eventSessionTicket) { // eventSessionTickets
                    return $eventSessionTicket->accessTickets->map(function ($accessTicket) use ($eventSessionTicket) {
                        // for each ticket, subtract the "tickets_count" with the "max_check_in" from the eventSessionTicket
                        return abs($accessTicket->tickets_count - $eventSessionTicket->ticket->max_check_in);
                    })->flatten();
                })->flatten();
            })->flatten();
        })
        ->flatten()
        ->sum();

        // Get all transactions
        $transactions = $userEntity->events->map(function ($event) {
            return $event->transactions->where('deleted', '=', 0);
        })->flatten();

        // Get the number of items per page from the request
        $perPage = $request->input('per_page', 10);

        // Paginate the transactions collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Get the items for the current page
        $currentPageItems = $transactions->slice(($currentPage - 1) * $perPage, $perPage)->values();
        // Create a paginator for the items
        $paginatedTransactions = new LengthAwarePaginator($currentPageItems, $transactions->count(), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        flash(__('Welcome'))->overlay()->success();
        // Return the view with all data and transactions paginated at the value of 10
        return view('home.index')->with([
            'events' => $events,
            'totalSold' => $tickets,
            'totalEntries' => $totalEntries,
            'transactions' => $paginatedTransactions,
            'perPage' => $perPage,
        ]);
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
