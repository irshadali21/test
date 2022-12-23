<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $messages = $this->messageRepository->paginate(10);

        return view('messages.index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);

        Flash::success('Message saved successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified Message in storage.
     *
     * @param int $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success('Message updated successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified Message from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message deleted successfully.');

        return redirect(route('messages.index'));
    }



    public function getMessage($user_id)
    {
        $my_id = auth()->user()->id;
        // Make read all unread                                      
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->get();
        // Get Receiver user Detail
        $chatUser = User::find($user_id);

        return [
            'view1' => view('messages.chat-message-data')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->render(),
            'view2' => view('messages.user-profile-details')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->render()
        ];
    }
    public function chat()
    {
        if (Auth::user()->hasrole('super-admin')) {
            $users = User::where('id', '!=' , 1 )->get(); 
        }else{
            $users = User::where('id', 1)->get(); 
        }

       
    //    dd($users );
    //    $user_id = Auth::id();
        $user_id = auth()->id();
        $message = Message::where(function ($query) use ($user_id) {
            $query->where('from_user', $user_id)->orWhere('to_user', $user_id);
        })->get();
        return view('messages.chat')->with('message', $message)->with('users', $users);
    }

    // Send Messages using pusher
    public function sendMessage(Request $request)
    {
        $from = auth()->id();
        $to = $request->receiver_id;
        $message = $request->message;
        $data = new Message();
        $data->from_user = $from;
        $data->to_user = $to;
        $data->message = $message;
        
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        // // pusher
        // $options = array(
        //     'cluster' => 'ap2',
        //     'useTLS' => true
        // );
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );
        // $data = ['from_user' => $from, 'to_user' => $to]; // sending from and to user id when pressed enter
        // $pusher->trigger('my-channel', 'my-event', $data); 
        return $data;
    }

    public function getLastMessage($user_id)
    {
        $my_id = Auth::id();
        // Make read all unread message
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->orderBy('id', 'DESC')->limit(1)->get();
 
        $chatUser = User::find($user_id);

        return view('messages.message-conversation')->with(['messages' => $messages])->with(['chatUser' => $chatUser]);
    }

    public function sendmessagetoaaladvisor(Request $request)
    {

        $from = auth()->id();
        $message = $request->massage;
        $exceptThis = [1];
        $advisor = User::whereNotIn('id', $exceptThis)->get();
        $count = count($advisor);
        try {
            for ($i=0; $i < $count ; $i++) { 
                $to = $advisor[$i]->id;
                $data = new Message();
                $data->from_user = $from;
                $data->to_user = $to;
                $data->message = $message;
                $data->is_read = 0; // message will be unread when sending message
                $data->save();   
            }
            return Response::json([
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return Response::json([
                'success' => false,
            ], 200);
        }
        
    }
}
