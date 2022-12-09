<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Lastconversation;
use App\Models\Messages;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{


    public function index()
    {
        return view('Chat/chat');
    }

    public function fetchMessages(){
        return Messages::with('utilisateur')->get();
    }

    public function sendMessage(Request $request){
        broadcast(new MessageSent('hello world', $request->session()->get('id')))->toOthers();
        return ['status' => 'Message Sent!'];
    }

    public function saveMessage(Request $request){
        $message = new Messages();
        $message->idclientssent = $request->idclientssent;
        $message->messages = $request->messages;
        $message->save();
        return redirect()->back();
    }

    public function saveMessageAdmin(Request $request){
        $message = new Messages();
        $message->idclientssent = 1;
        $message->idclientsreceive = $request->idclient;
        $message->messages = $request->messages;
        $result = $message->save();
        if($result) return ["Result"=>"Success"];
        else return ["Result"=>"Failed"];
        //return json_encode(csrf_token());
    }

    public function getMessages(Request $request){
        $soffset = $request->get('offset');
        //$offset = 0;
        $id = $request->session()->get('id');
        // $id = $request->get('id');

        $messages['total'] = DB::table('messages')
                                ->select(DB::raw('count(*) as total'))
                                ->where('idclientssent', $id)
                                ->orWhere('idclientsreceive', $id)
                                ->get();

        //$total = $messages['total'][0];
        $limite = 4;
        //$total = intval($messages['total'][0]);
        // $offset = $messages['total'] - $limite;

        $offset = intval($messages['total'][0]->total) - $limite;

        //if(!empty($soffset)) $offset = intval($soffset);

        $messages['message'] = Messages::where('idclientssent', $id)
                                ->orWhere('idclientsreceive', $id)
                                ->orderBy('dateheurechat', 'asc')
                                ->limit($limite)
                                ->offset($offset)
                                ->get();
        //return view('Template', compact('messages'));
        // var_dump($messages);

        //return json_encode($messages['message']);
        return response()->json($messages['message']);
    }

    public function getListMessage(){
        $liste['message'] = Lastconversation::get();
        return response()->json($liste['message']);
    }

    public function getMessagesAdmin(Request $request){
        $idclient = $request->get('idclient');
        $soffset = $request->get('offset');
        $offset = 0;

        $messages['total'] = DB::table('messages')
                                ->select(DB::raw('count(*) as total'))
                                ->where('idclientssent', $idclient)
                                ->orWhere('idclientsreceive', $idclient)
                                ->get();

        $limite = 4;

        $offset = intval($messages['total'][0]->total) - $limite;

        //if(!empty($soffset)) $offset = intval($soffset);

        $messages['message'] = Messages::where('idclientssent', $idclient)
                                ->orWhere('idclientsreceive', $idclient)
                                ->orderBy('dateheurechat', 'asc')
                                ->limit($limite)
                                ->offset($offset)
                                ->get();
        return response()->json($messages['message']);
    }

    public function getClient(Request $request){
        $idclient = $request->get('idclient');
        $client['aboutclient'] = Utilisateur::where('id', $idclient)
                                    ->get();
        return response()->json($client['aboutclient']);
    }

    public function getToken(){

    }

}
